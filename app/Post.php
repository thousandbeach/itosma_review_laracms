<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Model
{
    // $fillable
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function Userr(){
        return $this->belogsTo('Userr', 'user_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
