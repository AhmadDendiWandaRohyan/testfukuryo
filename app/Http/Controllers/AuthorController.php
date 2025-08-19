<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('pages.masterauthor.author', compact('authors'));
    }

    public function create()
    {
        return view('pages.masterauthor.createauthor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string',
        ]);

        Author::create($request->all());
        return redirect()->route('pages.author')->with('success', 'Author added successfully');
    }

    public function edit(Author $author)
    {
        return view('pages.masterauthor.editauthor', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string',
        ]);

        $author->update($request->all());
        return redirect()->route('pages.author')->with('success', 'Author updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('pages.author')->with('success', 'Author deleted successfully');
    }
}
