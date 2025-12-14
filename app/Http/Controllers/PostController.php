<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * For all port showing
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('search');

        $posts = Post::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('excerpt', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('admin.posts', [
            'posts' => $posts,
            'keyword' => $keyword
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * For insert, that keeping port 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Mahbub";
        $thumbnail = "http://127.0.0.1:8000/assets/img/blog-post.png";
        $excerpt = "This is a standard data post/insert methode";

        $insert_post = DB::insert("INSERT INTO posts (title, thumbnail, excerpt) VALUES (?, ?, ?)", [$title, $thumbnail, $excerpt]);

        if ($insert_post) {
            return "post has been inserted";
        }
    }

    /**
     * Store a newly created resource in storage.
     * For store data to database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * For single post showing
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * For post editing
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::all();
        return view('admin.edit-post', [
            'post' => $post,
            'categories' => $category,
            'cat' => $post->category
        ]);
    }
    public function update(Request $request, Post $post)
    {
        $post->update(request()->all());
        return back()->with('success', 'Post has been updated...');
    }

    /**
     * Remove the specified resource from storage.
     * For delete the data
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_id = 9;
        DB::table("posts")
            ->where('id', $post_id)
            ->delete();
    }
}
