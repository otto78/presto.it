<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'surname',
        'gender',
        'image',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
