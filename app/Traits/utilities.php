<?php 

namespace app\Traits;
use Illuminate\Support\Str;
use App\Post;
use App\Category; 
use Carbon\Carbon;


trait Utilities  
{

    // Given an array of filters
    // Set an array of all the conditions 
    // using query builder
    // $conditions will be passed in the where() method
    static public function setConditionsDB($filters_arr) 
    {
        $conditions = [];

        if (isset($filters_arr['title'])) {

            $conditions[] = ['title', 'like', '%'. $filters_arr['title'] . '%'];
        } 
        if (isset($filters_arr['content'])) {

            $conditions[] = ['content', 'like', '%'. $filters_arr['content'] . '%'];
        }
        if (isset($filters_arr['category'])) {
            
            $conditions[] = ['category_id', $filters_arr['category']];
        }
        if (isset($filters_arr['tag'])) {

            $conditions[] = ['tag_id', $filters_arr['tag']];
        }
        
        return $conditions; 
    }


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


    static public function formatDate($arr) {

        foreach ($arr as $post) {
            $parsedDate = Carbon::parse($post->updated_at);
            $dt = Carbon::createFromFormat('Y-m-d H:i:s', $parsedDate); 

            $post['updatedAt'] = $dt->toRfc850String(); 

        }
    }

}