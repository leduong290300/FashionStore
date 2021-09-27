<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
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
    }
}
