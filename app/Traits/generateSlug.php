<?php

namespace app\Traits;
use Illuminate\Support\Str;
use App\Post;
use App\Category; 
trait GenerateSlug 
{
    static public function createSlug($el) 
    {
        if (is_array($el)) {

            $colName = in_array('title', $el) ? 'title' : 'name';
            $slug =  Str::slug($el[$colName]);

        } else if (is_object($el)) {
            $colName = $el->title ? 'title' : 'name';
            $slug = Str::slug($el->$colName);
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