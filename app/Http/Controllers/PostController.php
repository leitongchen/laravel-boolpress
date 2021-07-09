<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Traits\Utilities;


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

        $categories = Category::all();
       

        if (isset($incomingData)) {
            $data = [
                'posts' => $incomingData,
                'categories' => $categories
            ];
        } else {
            $data = [
                'posts' => Post::orderBy('updated_at', 'DESC')
                    ->get(),
                'categories' => $categories
            ];
        }

        Utilities::formatDate($data['posts']);
        
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

        $conditions = Utilities::setConditionsDB($filters);

        $posts = Post::
                    with('user')
                    ->with('category')
                    ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
                    ->where($conditions)
                    ->get();
        
        return redirect()->route('posts.index')->with(['posts' => $posts]);
    }

}
