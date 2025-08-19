<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Tampilkan semua buku
    public function index()
    {
        $books = Book::with(['category', 'author'])->get();
        return view('pages.masterbook.book', [
            'title' => 'Master Book',
            'books' => $books,
            'categories' => Category::all(),
            'authors' => Author::all(),
        ]);
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'status' => 'required|in:Enable,Disable',
        ]);

        Book::create($request->all());

        return redirect()->route('pages.book')->with('success', 'Book created successfully.');
    }

    // Update buku
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'book_name' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'status' => 'required|in:Enable,Disable',
        ]);

        $book->update($request->all());

        return redirect()->route('pages.book')->with('success', 'Book updated successfully.');
    }

    // Hapus buku
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('pages.book')->with('success', 'Book deleted successfully.');
    }
}
