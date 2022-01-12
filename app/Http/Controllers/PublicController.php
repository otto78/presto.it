<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return view ('home');
    }
    public function articleByCategory($category, $category_id){
        $category=Category::find($category_id);
        $articles=$category->articles()->paginate(5);
        return view('articles', compact('category', 'articles'));
        }
}
