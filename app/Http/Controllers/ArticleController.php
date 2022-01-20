<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\ArticleImage;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;


class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {   
        
        $articles=Article::where('is_accepted', true)->orderBy('created_at','desc')->paginate(10);
        
        return view('article.index', compact('articles'));
    }
    
    
    // public function newArticle(){
        
        //     $uniqueSecret=base_convert(sha1(uniqid(mt_rand())),16,36);
        //     return view()
        
        // }
        
        /* Funzione che fa vedere gli articoli rifiutati 
        
        public function indexReject()
        {   
            
            $articles=Article::where('is_accepted', false)->orderBy('created_at','desc')->get();
            return view('article.index', compact('articles'));
        }
        */
        
        
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create(Request $request)   
        {
            $uniqueSecret = $request->old(
                'uniqueSecret',
                base_convert(sha1(uniqid(mt_rand())),16,36));
            
            $categories=Category::all();
            
            return view('article.create', compact('categories', 'uniqueSecret'));
        }
        
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(ArticleRequest $request)
        {   
            
            $article=Article::create([
                'title' => $request->title, 
                'description' => $request->description,
                'story'=> $request->story,
                'price'=> $request->price,
                'user_id'=>Auth::id(),
            ]);
            $article->categories()->sync($request->categories);
            
            $uniqueSecret = $request->input('uniqueSecret');
            $images = session()->get("images.{$uniqueSecret}", []);
            $removedImages= session()->get("removedimages.{$uniqueSecret}", []);

            $images = array_diff($images, $removedImages);

            foreach ($images as $image) {
                $i = new ArticleImage();

                $fileName = basename($image);
                $newFileName="public/articles/{$article->id}/{$fileName}";
                Storage::move($image, $newFileName);

                //Dimensione immagine croppata
                /* dispatch(new ResizeImage(
                    $newFileName,
                    300, 300
                ));

                //Secondo Dispach da capire come usare
                dispatch(new ResizeImage(
                    $newFileName,
                    600, 600
                )); */
                
                
                $i->file = $newFileName;
                $i->article_id = $article->id;
                
                $i->save();
                
                GoogleVisionSafeSearchImage::withChain([

                    new GoogleVisionLabelImage($i->id),
                    new GoogleVisionRemoveFaces($i->id),
                    new ResizeImage($newFileName, 300, 300),
                    new ResizeImage($newFileName, 600, 600),
                    


                ])->dispatch($i->id);

                
            }
            
            File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
            
            return redirect(route('article.index'))->with('message', "L'annuncio è stato inserito correntamente!");
        }
        
        public function uploadImage(Request $request)
        {
            
            $uniqueSecret = $request->input('uniqueSecret');
            $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
            

            /* dimensioni thumbnial dropzone */
            dispatch(new ResizeImage(
                $fileName,
                120, 120
            ));
            
            session()->push("images.{$uniqueSecret}", $fileName);
            


            return response()->json(
                    [
                    'id'=> $fileName
                    ]
                );
        }
        
        
        public function removeImage(Request $request)
        {
            $uniqueSecret = $request ->input('uniqueSecret');
            $fileName = $request->input('id');
            session()->push("removedimages.{$uniqueSecret}", $fileName);
            Storage::delete($fileName);

            return response()->json('ok');

        }

        public function getImage(Request $request)
        {
            $uniqueSecret = $request ->input('uniqueSecret');

            $images = session()->get("images.{$uniqueSecret}", []);
            $removedImages= session()->get("removedimages.{$uniqueSecret}", []);

            $images = array_diff($images, $removedImages);

            $data = [];

            foreach($images as $image){
                $data[] = [
                    'id'=> $image,
                    'src'=> ArticleImage::getUrlByFilePath($image, 120,120)
                ];
            }

            return response()->json($data);
        }

        /**
        * Display the specified resource.
        *
        * @param  \App\Models\Article  $article
        * @return \Illuminate\Http\Response
        */
        public function show(Article $article)
        
        {
            
            return view ('article.show', compact('article'));
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Models\Article  $article
        * @return \Illuminate\Http\Response
        */
        public function edit(Article $article){
            $categories=Category::all();
            
            return view ('article.edit', compact('article', 'categories'));
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Models\Article  $article
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, Article $article)
        {
            $article->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'story' => $request->story,
                'price'=> $request->price,
                
                
            ]);
            $article->categories()->sync($request->categories);
            
            return redirect(route('article.index'))->with('message', 'Hai modificato correttamente il tuo articolo');
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Models\Article  $article
        * @return \Illuminate\Http\Response
        */
        public function destroy(Article $article)
        {
            foreach($article->categories as $category){
                $article->categories()->detach($category->id);
            }
            
            $article->delete();
            
            
            return redirect(route('article.index'))->with('message', 'Hai eliminato correttamente il tuo articolo');
            
        }
        
        
        
        public function articlesByAuth(User $user){
            
            $articles=Article::where('user_id', $user->id)->where('is_accepted', true)->paginate(5);
            /* dd($articles); */
            return view('article.articlesByAuth', compact('articles', 'user'));
        }
    }

    
    