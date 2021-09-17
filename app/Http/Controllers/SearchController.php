<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class SearchController extends Controller
{
    //Module:search products
    public function show(Request $request)
    {
    $resultOfSearch = $request->input('search_product');
    $categories = Categories::all();
    $products = Products::query()
        ->where('name','LIKE',$resultOfSearch)
        ->get();
    return view('pages.search',[
        'products' => $products,
        'resultSearch' =>$resultOfSearch,
        'categories' => $categories
    ]);
//    if(count($products) > 0) {
//        return view('pages.search',[
//            'products' => $products,
//            'resultSearch' =>$resultOfSearch,
//            'categories' => $categories
//        ]);
//    }
//    else {
//      return "Product not found";
//    }

    }
}
