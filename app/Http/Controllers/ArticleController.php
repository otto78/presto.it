<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleImage;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
        
        $articles=Article::where('is_accepted', true)->orderBy('created_at','desc')->get();
        
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
        public function create()   
        {
            $uniqueSecret=base_convert(sha1(uniqid(mt_rand())),16,36);
            $categories=Category::all();
            
            return view('article.create', compact('categories', 'uniqueSecret'));
        }
        
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {   
            
            $article=Article::create([
                'title' => $request->title, 
                'description' => $request->description,
                'price'=> $request->price,
                'user_id'=>Auth::id(),
            ]);
            $article->categories()->sync($request->categories);
            
            $uniqueSecret = $request->input('uniqueSecret');
            
            $images = session()->get("images.{$uniqueSecret}");
            foreach ($images as $image) {
                $i = new ArticleImage();

                $fileName = basename($image);
                $newFileName="/public/articles/{$article->id}/{$fileName}";
                Storage::move($image, $newFileName);
                //in origine {$a->id}

                $i->file = $newFileName;
                $i->article_id = $article->id;

                $i->save();
                
            }
            
            File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
            
            return redirect(route('article.index'))->with('message', "L'annuncio è stato inserito correntamente!");
        }
        
        public function uploadImage(Request $request)
        {
            // dd('ciao a tutti');
            $uniqueSecret = $request->input('uniqueSecret');
            $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
            session()->push("images.{$uniqueSecret}", $fileName);
            
            return response()->json(
                    [
                    'id'=> $fileName
                    ]
                );
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
            
            $articles=Article::where('user_id', $user->id)->where('is_accepted', true)->get();
            dd($articles);
            return view('article.articlesByUser', compact('articles', 'user'));
        }
    }

    
    