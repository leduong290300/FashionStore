<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->id;
        $size = $request->size;
        $color = $request->color;
        $selectQuanlity = $request->selectQuanlity;
        $product = Products::find($id);
        $cart = session()->get('cart');
        if( isset($cart[$id]) ) {
            $cart[$id]['quanlity'] = $cart[$id]['quanlity'] +1 ;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'size' => $size,
                'color' => $color,
                'quanlity' => $selectQuanlity ,
                'photo' => $product->photos
            ];
        }
        session()->put('cart',$cart);
    }
}
