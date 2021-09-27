<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class AboutController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('pages.about',[
            'categories' => $categories
        ]);
    }
}
