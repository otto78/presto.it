<?php

namespace App\Models;


use App\Models\User;
use App\Models\Category;
use App\Models\ArticleImage;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;

    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'story',
        'price',
        'user_id',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Article::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        $categorie = $this->categories->pluck('category')->join(', ');
        
        $array=[
            'id'=> $this->id,
            'title'=> $this->title,            
            'description'=> $this->description,
            'story'=> $this->story,
            'price'=> $this->price,
            'category'=> $categorie,
            

        ];
        return $array;
    }
    
    public function images(){
        return $this->hasMany(ArticleImage::class);
    }
}