<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();
        $author = Author::first();

        Book::create([
            'book_name' => 'Contoh Buku Laravel',
            'isbn' => '978-602-1234-567',
            'category_id' => $category?->id ?? 1,
            'author_id' => $author?->id ?? 1,
            'status' => 'Enable',
        ]);
    }
}
