<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Traits\generateSlug;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Post $post)
    {
        $incomingData = session('posts');

        if (isset($incomingData)) {
            $data = [
                'posts' => $incomingData
            ];
        } else {
            $data = [
                'posts' => Post::orderBy('updated_at', 'DESC')
                    ->where('user_id', $request->user()->id)
                    ->get()
            ];
        }

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('admin.posts.create', [
            'categories' => $categoriesList,
            'tags' => $tagsList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPostInput = $request->all(); 

        $newPost = new Post();

        $newPost->fill($newPostInput);

        $newPost->user_id = $request->user()->id;
        $newPost->category_id = $request->category; 

        // Creating SLUG
        $slug = GenerateSlug::createSlug($newPost);

        $newPost->slug = $slug;
        $newPost->save();

        if ($request->tags) {
            $newPost->tags()->sync($newPostInput['tags']);
        }


        return redirect()->route('admin.posts.show', $newPost->slug);
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

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id); 
        $categoriesList = Category::all();
        $tagsList = Tag::all();


        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categoriesList,
            'tags' => $tagsList
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $form_data = $request->all();

        if ($form_data['title'] != $post->title) {

            $slug = GenerateSlug::createSlug($form_data);

            $form_data['slug'] = $slug; 
        }
        
        $post->category_id = $form_data['category']; 
        $post->update($form_data);

        $post->tags()->sync($form_data['tags']);


        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->detach();

        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    public function filter(Request $request) 
    {
        $filters = $request->all();
        $userId = Auth::user()->id;

        if (key_exists('category', $filters)) {

            $posts = Post::
                with('user')
                ->where([
                    ['category_id', $filters['category']],
                    ['user_id', $userId]
                ])
                ->get();
            

        } else if (key_exists('tag', $filters)) {

            $posts = Post::
            with('user')
            ->with('category')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            
            ->where([
                ['post_tag.tag_id', $filters['tag']],
                ['user_id', $userId]
            ])
            ->get();
        }
        
        return redirect()->route('admin.posts.index')->with(['posts' => $posts]);
    }
}
