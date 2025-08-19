<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

use App\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('dashboard', ['title' => 'Dashboard']);
// })->name('dashboard');


// Route::get('/category', [CategoryController::class, 'index'])->name('pages.category');


// Route::get('/author', function () {
//     return view('pages.author', ['title' => 'Master Author']);
// })->name('pages.author');

// Route::get('/book', function () {
//     return view('pages.book', ['title' => 'Master Book']);
// })->name('pages.book');

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->name('dashboard');



// Index (list data)
Route::get('/category', [CategoryController::class, 'index'])->name('pages.category');

// Form create
Route::get('/category/create', [CategoryController::class, 'create'])->name('pages.createcategory');

// Simpan data
Route::post('/category', [CategoryController::class, 'store'])->name('pages.storecategory');

// Detail
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('pages.showcategory');

// Form edit
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('pages.editcategory');

// Update data
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('pages.updatecategory');

// Hapus data
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('pages.destroycategory');

// Author
Route::get('/author', function () {
    return view('pages.author', ['title' => 'Master Author']);
})->name('pages.author');

// Book
Route::get('/book', function () {
    return view('pages.book', ['title' => 'Master Book']);
})->name('pages.book');




Route::get('/authors', [AuthorController::class, 'index'])->name('pages.author');
// Route::get('/authors/create', [AuthorController::class, 'create'])->name('pages.createauthor');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('pages.createauthor');

Route::post('/authors', [AuthorController::class, 'store'])->name('pages.storeauthor');
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('pages.editauthor');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('pages.updateauthor');
Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('pages.destroyauthor');
