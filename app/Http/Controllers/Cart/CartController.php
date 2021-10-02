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
            $cart[$id]['quanlity'] += $selectQuanlity;
            $cart[$id]['size'] = $cart[$id]['size'].' , '.$size ;
            $cart[$id]['color'] = $cart[$id]['color'].' , '.$color ;
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
        return response()->json([
            'status' => 200,
            'success' => 'success'
        ],200);
    }

    public function update (Request $request,$id)
    {
        if($id && $request->quanlity) {
            $cart = session()->get('cart');
            $cart[$id]['quanlity'] += $request->quanlity;
        }
        try {
            session()->put('cart',$cart);
            return response()->json([
                'status' => 200,
                'success' => 'success'
            ],200);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json([
                'status' => 400,
                'error' => 'error'
            ],200);
        }
    }

    public function destroy ($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return response()->json([
            'status' => 200,
            'success' => 'Product removed successfully'
        ],200);
    }
}
