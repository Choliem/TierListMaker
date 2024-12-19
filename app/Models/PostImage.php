<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'image']; // Fillable properties

    // Define the inverse relationship to Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
