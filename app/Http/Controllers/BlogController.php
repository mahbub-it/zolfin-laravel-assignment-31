<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $search = request('search');

        return view('pages.blog', [
            'posts' => Post::with('category', 'user')
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->paginate(3),
            'title' => 'Blog'
        ]);

    }

    public function single(Post $post)
    {

        $category = $post->category;

        $post->increment('views', 1);

        // dd(Post::where('slug', $slug)->get()->first()->title );
        // $category_id = $post->category_id;

        // $category_name = DB::table('categories')->where('id', $category_id)->get()->first()->name;
        // $category_slug = DB::table('categories')->where('id', $category_id)->get()->first()->slug;

        return view('pages.blog-details', [
            'data' => $post,
            'category' => $category,
            // 'slug' => $category_slug
        ]);
    }

    public function model_test()
    {
        dd(Post::all());
    }

    public function categoryWisePosts(Category $category)
    {

        return view('components.blog.category', [
            'title' => $category->name,
            'posts' => $category->posts()->paginate(2)
        ]);
    }

    public function userBasedPost(User $user)
    {

        return view('components.blog.user-post', [
            'title' => $user->name,
            'user' => $user,
            'posts' => $user->posts()->paginate(2),
        ]);
    }

}

