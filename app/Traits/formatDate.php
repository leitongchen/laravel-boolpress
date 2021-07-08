<?php

namespace app\Traits;
use Illuminate\Support\Str;
use App\Post;
use App\Category; 
use Carbon\Carbon;

trait FormatDate 
{
    static public function formatDate($arr) {

        foreach ($arr as $post) {
            $parsedDate = Carbon::parse($post->updated_at);
            $dt = Carbon::createFromFormat('Y-m-d H:i:s', $parsedDate); 

            $post['updatedAt'] = $dt->toRfc850String(); 

        }
    }
}