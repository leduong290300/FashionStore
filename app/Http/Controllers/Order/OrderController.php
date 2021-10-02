<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProducts;
use App\Models\Products;
use App\Models\Categories;
class OrderController extends Controller
{
    public function index()
    {
        return view('pages.manageOrder.order_index');
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        return view ('pages.purchase',[
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
