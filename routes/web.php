<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Models\Post;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home');
//


////DATA Show Methode////
// Post Controller //
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::resources([
        'posts' => PostController::class,
        'categories' => CategoryController::class
    ]);

});

Route::get('/blog', [BlogController::class, 'index'])->name("blog");
Route::get('/article/{post:slug}', [BlogController::class, 'single'])->name('single-post');

// Route::get('/model-test', [BlogController::class, 'model_test']);

// Route::get('/post/{id}', function($post_id){
//     $single_post = Post::find($post_id);

// Route::get('/post/{post::slug}', function(Post $post){
//     dd($post->content);
// });

Route::get('/category/{category:slug}', [BlogController::class, 'categoryWisePosts']);

Route::get('/users/{user:username}', [BlogController::class, 'userBasedPost'])->name('user-post');

// Route::get('search-page', function () {

//     $search_value = request('search');

//     $posts =
//         Post::
//             where('title', 'like', '%' . $search_value . '%')
//             ->orWhere('excerpt', 'like', '%' . $search_value . '%')
//             ->orWhere('content', 'like', '%' . $search_value . '%')
//             ->get();

//     return view('test-search', [

//         'posts' => $posts

//     ]);
// });

// Registration and login route 

// Route::get('register', [LoginController::class, 'register'])->name('register')->middleware('guest');
// Route::post('register', [LoginController::class, 'registerPost'])->name('registerProcess');

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'loginPost'])->name('loginProcess');

Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', [LoginController::class, 'signout'])->middleware('auth')->name('logout');

// Route::get('/img-upload', function () {
//     return view('upload-img');
// });

// Route::post('img-upload', function (Request $request) {

//     $image = $request->file('thumbnail');

//     $image_name = time() . '-' . $image->getClientOriginalName();

//     $image->storeAs('/public/images', $image_name);

//     return 'Image uploaded successfully';

// })->name('upload-img');

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
//     return 'Storage link created';
// });
