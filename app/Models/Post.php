<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); //relacion de columnas con el user
    }

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
