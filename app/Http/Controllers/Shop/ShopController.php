<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ShopController extends Controller
{
    public function index()
    {
        $products = Products::paginate(20);
        $categories = Categories::all();
        return view('pages.shops',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
