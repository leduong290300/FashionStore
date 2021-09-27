<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\PhotoSliders;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = PhotoSliders::all();
        $products = Products::all();
        $categories = Categories::all();
        return view('home',[
            'sliders' => $sliders,
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
