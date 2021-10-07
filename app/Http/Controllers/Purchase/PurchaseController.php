<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
class PurchaseController extends Controller
{

    public function showFormPurchaseProduct (Request $request)
    {

        dd($request->data);
        $categories = Categories::all();
        return view('pages.purchase',[
            'categories' => $categories,
            'data' => $data,
            'product' => $product
        ]);
    }

    public function submitPurchaseProduct (Request $request)
    {

        $data = $request;
        return redirect()->route('form_purchase_product',[
            'data' => $data
        ]);
    }
}
