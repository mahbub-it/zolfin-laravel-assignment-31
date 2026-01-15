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
use App\Http\Controllers\CustomerController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AssignmentController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::resources([
        'posts' => PostController::class,

    ]);

    Route::resources([

        'categories' => CategoryController::class,
        'users' => UserController::class
    ]);
});

Route::get('my-profile', [UserController::class, 'my_profile'])->name('user.profile');




Route::get('/blog', [BlogController::class, 'index'])->name("blog");
Route::get('/article/{post:slug}', [BlogController::class, 'single'])->name('single-post');



Route::get('/category/{category:slug}', [BlogController::class, 'categoryWisePosts']);

Route::get('/users/{user:username}', [BlogController::class, 'userBasedPost'])->name('user-post');


Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'loginPost'])->name('loginProcess');

// Show the registration form
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'registerPost'])->name('registerProcess');

Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', [LoginController::class, 'signout'])->name('logout')->middleware('auth');

Route::get('secret/migrate', function () {
    Artisan::call('migrate');
    Artisan::call('db:seed');

    return 'Migration done';
});

Route::group(
    [
        'prefix' => 'customer',
        'as' => 'customer.'
    ],
    function () {
        Route::get('register', [CustomerController::class, 'register'])->name('register')->middleware('guest');
        Route::post('register', [CustomerController::class, 'registerPost'])->name('registerProcess');

        Route::get('login', [CustomerController::class, 'login'])->name('login')->middleware('guest');
        Route::post('login', [CustomerController::class, 'loginPost'])->name('loginProcess');

        Route::group([
            'middleware' => 'is_customer'
        ], function () {
            Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        });

        Route::post('logout', [CustomerController::class, 'signout'])->name('logout');

    }
);

Route::get('/permission', function () {

    // $role = Role::create(['name' => 'Editor']);
    // $role = Role::create(['name' => 'Creator']);

    // $permission1 = Permission::create(['name' => 'Create Post']);
    // $permission2 = Permission::create(['name' => 'Edit Post']);

    // $permission1->assignRole($role);
    // $permission2->assignRole($role);

    // $user = User::firstWhere('id', 38);

    // $user = Post::firstWhere('id', 39);

    $user = User::find(34);

    // $user->syncPermissions(['Create Post', 'Edit Posts']);
    // echo $user->hasPermissionTo('Create Post'); //for check Create Post permission 

    echo $user->can('create post');

    // dd($user);
});

Route::get('make-payment', [PaymentController::class, 'view']);

Route::post('make-payment', [PaymentController::class, 'store'])->name('send-payment');

Route::get('/assignment', [AssignmentController::class, 'single_assignment'])->name('assignment');

Route::post('/assignment', [AssignmentController::class, 'assignment_score'])->name('providescore');
