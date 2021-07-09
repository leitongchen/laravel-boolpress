<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;


use App\Traits\Utilities; 

class HomeController extends Controller
{
    public function index() 
    {
        $allPosts = Post::orderBy('updated_at', 'DESC')->paginate(3);

        Utilities::formatDate($allPosts);

        return view('admin.home', ['posts' => $allPosts]);
    }
}
