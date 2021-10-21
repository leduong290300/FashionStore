<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\PurchaseRequest;
use App\Models\Customers;
use App\Models\Purchases;
class PurchaseController extends Controller
{
    public function purchaseProduct(PurchaseRequest $request)
    {
      /*Lưu thông tin người mua hàng*/
      $data = $request->validated();
      $value = [
        'name' => $data['userName'],
        'email' => $data['userEmail'],
        'address' => $data['userAddress'],
        'phone' => (int)$data['userPhone'],
        'notice' => $data['userNotice'],
        'delivery_time' => $data['userSelectTime']
      ];
      Customers::create($value);

      /*Lấy thông tin giỏ hàng từ session*/
      $purchaseProducts = session()->get('cart');
      /*Lấy thông tin người mua */
      $customer = Customers::all();
      foreach ($purchaseProducts as $purchaseProduct) {
        foreach ($customer as $data) {
          $purchases = [
            'code' => rand(0,9999),
            'name' => $purchaseProduct['name'],
            'size' => $purchaseProduct['size'],
            'color' => $purchaseProduct['color'],
            'quanlity' => $purchaseProduct['quanlity'],
            'image' => $purchaseProduct['photo'],
            'total_price' => (int)$purchaseProduct['price']*(int)$purchaseProduct['quanlity'],
            'customers_id' => $data['id'],
          ];
        }
      }
      Purchases::create($purchases);
      return response()->json(['success' => 'success']);
    }
}
