<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'follower_id'];

    // A user can have many followers
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A user can follow many users
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
}
