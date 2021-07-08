<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\Traits\generateSlug;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $categoriesList = Category::orderBy('updated_at', 'DESC')->get();

        $userPosts = Category::
            join('posts', 'posts.category_id', '=', 'categories.id')
            ->where("user_id", $userId)
            ->get();

        // dump($userPosts);
        // return;
        
        $data = [
            'categories' => $categoriesList,
            'user_posts' => $userPosts
        ];

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newInput = $request->all();

        $newCategory = new Category(); 

        $newCategory->name = $newInput['name'];
        
        // Creating SLUG
        $slug = GenerateSlug::createSlug($newCategory);

        $newCategory->slug = $slug;
        $newCategory->save();

        return redirect()->route('admin.categories.show', $newCategory->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        }

        $data = [
            'category' => $category
        ];

        return view('admin.categories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryToEdit = Category::findOrFail($id);

        return view('admin.categories.edit', ['category' => $categoryToEdit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $form_data = $request->all();

        if ($form_data['name'] != $category->name) {

            $slug = GenerateSlug::createSlug($form_data);

            $form_data['slug'] = $slug; 
        }
        $category->update($form_data);

        return redirect()->route('admin.categories.show', $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
