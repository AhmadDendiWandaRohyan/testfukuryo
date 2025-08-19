<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

// class CategoryController extends Controller
// {
//     public function index()
//     {
//         $categories = Category::all();
//         return view('pages.category', compact('categories'));
//     }
// }



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.mastercategory.category', compact('categories'))
            ->with('title', 'Master Category');
    }

    public function create()
    {
        return view('pages.mastercategory.createcategory')
            ->with('title', 'Tambah Category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Enable,Disable',
        ]);

        Category::create($request->all());

        return redirect()->route('pages.category')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('pages.mastercategory.showcategory', compact('category'))
            ->with('title', 'Detail Category');
    }

    public function edit(Category $category)
    {
        return view('pages.mastercategory.editcategory', compact('category'))
            ->with('title', 'Edit Category');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Enable,Disable',
        ]);

        $category->update($request->all());

        return redirect()->route('pages.mastercategory.category')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('pages.mastercategory.category')
            ->with('success', 'Category deleted successfully.');
    }
}

