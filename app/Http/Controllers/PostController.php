<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Traits\FormatDate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $incomingData = session('posts');

        if (isset($incomingData)) {
            $data = [
                'posts' => $incomingData
            ];
        } else {
            $data = [
                'posts' => Post::orderBy('updated_at', 'DESC')
                    ->get()
            ];
        }

        FormatDate::formatDate($data['posts']);
        
        return view('posts.index', $data);
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

        if (!$post) {
            abort(404);
        }

        $data = [
            'post' => $post
        ];

        return view('posts.show', $data);
    }


    public function filter(Request $request) 
    {
        $filters = $request->all();

        if (key_exists('category', $filters)) {

            $posts = Post::
                with('user')
                ->where([
                    ['category_id', $filters['category']],
                ])
                ->get();
            

        } else if (key_exists('tag', $filters)) {

            $posts = Post::
            with('user')
            ->with('category')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            
            ->where([
                ['post_tag.tag_id', $filters['tag']],
            ])
            ->get();
        }
        
        return redirect()->route('posts.index')->with(['posts' => $posts]);
    }

}
