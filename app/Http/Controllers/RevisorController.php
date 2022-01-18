<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');

    } 
    public function index(){

        $article=Article::where('is_accepted', null)->orderBy('created_at', 'desc')->first();
         //controllare p o s

        return view('revisor.index', compact('article'));

    }

    public function indexReject(){

        $articles=Article::where('is_accepted', false)->orderBy('created_at', 'desc')->get();
         //controllare p o s
        
        return view('revisor.indexReject', compact('articles'));
    }

    private function setAccepted($article_id, $value){

        $article=Article::find($article_id);
        $article->is_accepted=$value;
        $article->save();
        return redirect(route('revisor.index'));

    }


    
    public function restore($article_id){
        
        $article=Article::where('id', $article_id)->update(['is_accepted'=> NULL]);
        // $value=null;
        // $article=Article::find($article_id);
        // $article->is_accepted=$value;
        // $article->save();
        
        return redirect(route('revisor.indexReject', compact('article')));
        // // return $this->setAccepted($article_id, null);

    }


    public function accept($article_id){

        return $this->setAccepted($article_id, true);

    }

    public function reject($article_id){

        return $this->setAccepted($article_id, false);

    }
}



