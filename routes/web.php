<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Models\Post;
use App\Http\Controllers\LoginController;

// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home');
//


////DATA Show Methode////
// Post Controller //
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts');
//

////DATA Post Standard Methode////
Route::get('/create-post', [PostController::class, 'create']);
//

////DATA Update Standard Methode////
Route::get('/admin/post/{post}', [PostController::class, 'edit'])->name('admin.post.edit');

Route::put('/admin/post/update/{post}', [PostController::class, 'update'])->name('admin.post.update');
//

////Or Another Way to DATA Delete ////
Route::get('/delete-post', [PostController::class, 'destroy']);
//

//
Route::get('/blog', [BlogController::class, 'index'])->name("blog");
//

Route::get('/article/{post}', [BlogController::class, 'single'])->name('single-post');

Route::get('/model-test', [BlogController::class, 'model_test']);

// Route::get('/post/{id}', function($post_id){
//     $single_post = Post::find($post_id);

// Route::get('/post/{post::slug}', function(Post $post){
//     dd($post->content);
// });

Route::get('category/{category:slug}', [BlogController::class, 'categoryWisePosts']);

Route::get('users/{user:username}', [BlogController::class, 'userBasedPost'])->name('user-post');

Route::get('search-page', function () {

    $search_value = request('search');

    $posts =
        Post::
            where('title', 'like', '%' . $search_value . '%')
            ->orWhere('excerpt', 'like', '%' . $search_value . '%')
            ->orWhere('content', 'like', '%' . $search_value . '%')
            ->get();

    return view('test-search', [

        'posts' => $posts

    ]);
});

// Registration and login route 

Route::get('register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [LoginController::class, 'registerPost'])->name('registerProcess');

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'loginPost'])->name('loginProcess');

Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', [LoginController::class, 'signout'])->middleware('auth')->name('logout');