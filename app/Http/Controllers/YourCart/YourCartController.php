<?php

namespace App\Http\Controllers\YourCart;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class YourCartController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('pages.shoping_cart',[
            'categories' => $categories
        ]);
    }


}
