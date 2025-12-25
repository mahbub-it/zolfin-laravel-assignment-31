<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request('search');

        $title = "All Categories";

        $categories = Category::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('slug', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')->paginate(6);

        return view("admin.categories.index", compact("keyword", "categories", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->category_name;
        $category->slug = strtolower(implode("-", explode(" ", $request->category_name)));
        $category->save();

        if ($category->save()) {
            return back()->with("message", "Category created successfully");
        } else {
            return back()->with("message", "Category created failed");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keyword = request('search');

        $title = "Edit Category";

        $currentCategory = Category::firstWhere("id", $id);

        $categories = Category::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('slug', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')->paginate(6);

        return view("admin.categories.edit", compact("keyword", "categories", "title", "categories", "currentCategory"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::firstWhere("id", $id);

        $category->name = $request->category_name;
        $category->slug = strtolower(implode("-", explode(" ", $request->category_slug)));

        $category->save();

        if ($category->save()) {
            return back()->with("message", "Category updated successfully");
        } else {
            return back()->with("message", "Category updated failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new_category = request("new_category");

        $category = Category::firstWhere("id", $id);

        $category->delete();

        $category->posts()->update([
            "category_id" => $new_category
        ]);

        return redirect()->route("categories.index")->with("message", "Category deleted successfully");
    }
}
