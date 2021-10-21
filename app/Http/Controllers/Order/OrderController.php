<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Purchases;
class OrderController extends Controller
{
    public function index()
    {
        $userPurchases = Customers::all();
        return view('pages.manageOrder.order_index',[
          'userPurchases' => $userPurchases
        ]);
    }

    public function show($id)
    {
      $userPurchaseProduct = Customers::find($id)->purchaseProduct;
      dd($userPurchaseProduct);
    }

}
