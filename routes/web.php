<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::resources([
        'posts' => PostController::class,

    ]);

    Route::group(['middleware' => 'is_admin'], function () {
        Route::resources([

            'categories' => CategoryController::class,
            'users' => UserController::class
        ]);
    });

    Route::get('my-profile', [UserController::class, 'my_profile'])->name('user.profile');

});


Route::get('/blog', [BlogController::class, 'index'])->name("blog");
Route::get('/article/{post:slug}', [BlogController::class, 'single'])->name('single-post');



Route::get('/category/{category:slug}', [BlogController::class, 'categoryWisePosts']);

Route::get('/users/{user:username}', [BlogController::class, 'userBasedPost'])->name('user-post');


Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'loginPost'])->name('loginProcess');

Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', [LoginController::class, 'signout'])->middleware('auth')->name('logout');


// Show the registration form
Route::get('register', [LoginController::class, 'register'])->name('register');

// Handle the form submission
Route::post('register', [LoginController::class, 'registerPost'])->name('registerProcess');

Route::get('secret/migrate', function () {
    Artisan::call('migrate');

    return 'Migration done';
});