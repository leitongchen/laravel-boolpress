<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->with('user')->get(); 

        return response()->json([
            "success" => true,
            "results" => $posts
        ]);
    }
}
