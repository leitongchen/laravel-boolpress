<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id',
        "title",
        "slug",
        "post_cover",
        "content",
        "src"
    ];

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function tags() 
    {
        return $this->belongsToMany('App\Tag');
    }
}
