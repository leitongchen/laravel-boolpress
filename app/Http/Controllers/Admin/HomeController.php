<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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

        $data = [
            "posts" => $allPosts,
            "categories" => Category::orderBy('name', 'ASC')->get()
        ];


        return view('admin.home', $data);
    }
}
