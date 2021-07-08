<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $allPosts = Post::orderBy('updated_at', 'DESC')->get();

        return view('admin.home', ['posts' => $allPosts]);
    }
}
