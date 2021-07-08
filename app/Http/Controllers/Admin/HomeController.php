<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Traits\FormatDate; 

class HomeController extends Controller
{
    public function index() 
    {
        $allPosts = Post::orderBy('updated_at', 'DESC')->get();

        FormatDate::formatDate($allPosts);

        return view('admin.home', ['posts' => $allPosts]);
    }
}
