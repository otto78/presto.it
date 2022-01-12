<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'price',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
