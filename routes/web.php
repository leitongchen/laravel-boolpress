<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// GUEST ROUTES POST index/show
// Route::resource('/posts', 'PostController');
Route::get('/posts/filter', 'PostController@filter')->name('posts.filter');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');


// Route::get('admin/posts/filter', 'Admin\PostController@filter')->name('admin.posts.filter');



// ADMIN ROUTES POST CRUD
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function() {

        Route::get('/', 'HomeController@index')->name('index');

        Route::get('/posts/filter', 'PostController@filter')->name('posts.filter');

        Route::resource('/posts', 'PostController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/tags', 'TagController');


});



