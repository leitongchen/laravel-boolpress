<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use App\Traits\FormatDate;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::
            with('user')
            ->orderBy('updated_at', 'DESC')
            ->get();

        FormatDate::formatDate($posts);
        
        return view('posts.index', ['posts'=>$posts]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // dump($slug);

        if (!$post) {
            abort(404);
        }

        $data = [
            'post' => $post
        ];

        return view('posts.show', $data);
    }

}
