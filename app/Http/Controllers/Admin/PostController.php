<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Traits\Utilities;
use Illuminate\Support\Facades\Storage;
use Throwable;

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
                'posts' => $incomingData,
            ];
        } else {
            $data = [
                'posts' => Post::orderBy('updated_at', 'DESC')
                    ->where('user_id', $request->user()->id)
                    ->get()
            ];
        }

        $data['categories'] = Category::all();
        // dump($data);
        // return; 

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

        // dump($request);
        // return; 

        $newPost = new Post();
        $newPost->fill($newPostInput);

        $newPost->user_id = $request->user()->id;
        $newPost->category_id = $request->category; 

        // Creating SLUG
        $slug = Utilities::createSlug($newPost);
        $newPost->slug = $slug;

        // Img upload
        if (array_key_exists('post_cover', $newPostInput)) {
            $img_path = Storage::put('postsCovers', $newPostInput['post_cover']);
            $newPost->post_cover = $img_path;
        }

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
        $userId = Auth::user()->id; 

        $post = Post::where('slug', $slug)->first();

        // dump($post->user_id);
        // return;

        if (!$post || $post->user_id != $userId) {
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
            $slug = Utilities::createSlug($form_data);
            $form_data['slug'] = $slug; 
        }
        
        if ($post->post_cover) {
            Storage::delete($post->post_cover);
        }
        if (array_key_exists('post_cover', $form_data)) {

            $img_path = Storage::put('postsCovers', $form_data['post_cover']);
            $form_data['post_cover'] = $img_path;
        }

        if (array_key_exists('category', $form_data)) {
            $post->category_id = $form_data['category']; 
        }

        if (array_key_exists('tags', $form_data)) {
            $post->tags()->sync($form_data['tags']);
        }

        $post->update($form_data);

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

        $conditions = Utilities::setConditionsDB($filters);

        //adding user verification
        $conditions[] = ['user_id', $userId]; 

        $posts = Post::
                    with('user')
                    ->with('category')
                    ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
                    ->where($conditions)
                    ->get();
        
        return redirect()->route('admin.posts.index')->with(['posts' => $posts]);
    }
}
