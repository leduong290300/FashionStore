<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class BlogController extends Controller
{
    public function index() {
        $categories = Categories::all();
        return view('pages.blog',[
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $categories = Categories::all();
        return view('pages.blog_details',[
            'categories' => $categories
        ]);
    }
}
