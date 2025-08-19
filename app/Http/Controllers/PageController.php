<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard() {
        return view('pages.dashboard');
    }

    public function category() {
        return view('pages.category');
    }

    public function author() {
        return view('pages.author');
    }

    public function book() {
        return view('pages.book');
    }
}
