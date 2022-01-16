<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home(){
        return view ('home');
    }
    public function articlesByCategory($category, $category_id){
        $category=Category::find($category_id);
        $articles=$category->articles()->where('is_accepted', true)->paginate(5);
        
        return view('article.articlesByCategory', compact('category', 'articles'));
        }

    public function articlesByUser(User $user){
       
        $articles=Article::where('user_id', $user->id)->where('is_accepted', true)->get();
        
        return view('article.articlesByUser', compact('articles', 'user'));
    }



    public function search(Request $request){
        $q = $request->input('q');
        $articles = Article::search($q)->get();

        return view('search_results', compact('q', 'articles'));
    }

    public function workWithUs(){
        return view('revisor.workWithUs');
    }
}
