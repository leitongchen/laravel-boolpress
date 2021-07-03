<?php

namespace app\Traits;
use Illuminate\Support\Str;
use App\Post;

trait GenerateSlug 
{
    static public function createSlug($post) 
    {
        if (is_array($post)) {
            $slug =  Str::slug($post['title']);
        } else {
            $slug = Str::slug($post->title);
        }
        $start_slug = $slug; 

        $slug_exist = Post::where('slug', $slug)->first();
        $counter = 1; 

        while ($slug_exist) {
            $slug = $start_slug . "-" . $counter; 
            $counter++; 

            $slug_exist = Post::where('slug', $slug)->first();
        }

        return $slug; 

    }
}