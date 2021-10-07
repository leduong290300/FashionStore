<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(3);
        return view('pages.manageProduct.product_index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('pages.manageProduct.product_create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Products\ProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $data = $request->validated();
        $productImg = time().'_'.$data['product']->getClientOriginalName();
        $values = [
            'name' => $data['name'],
            'price' => $data['price'],
            'size' => $data['size'],
            'color' => $data['color'],
            'inventory' => $data['inventory'],
            'description_long' => $data['description_long'],
            'description_short' => $data['description_short'],
            'category' => $data['category'],
            'code' => $data['code'],
            'photos' => $productImg
        ];
        $products = new Products();
        try {
            $products->create($values);
            $data['product']->storeAs('public/images/products', $productImg);
            $success = 'Add products success';
            return redirect()
                ->route('products.index')
                ->with('success',$success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Add products failed';
        }
        return back()->with('error',$error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Products::all()->find($id);
        $categories = Categories::all();
        return view('pages.shops_details',[
            'item' => $item,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        return view('pages.manageProduct.product_edit',[
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Products\ProductsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        $data = $request->validated();
        $productUpdate = Products::findOrFail($id);
        $productImgNew = time().'_'.$data['product']->getClientOriginalName();
        $productImgOld = Storage::files('public/images/products',$productUpdate->photos);
        $values = [
            'name' => $data['name'],
            'price' => $data['price'],
            'size' => $data['size'],
            'color' => $data['color'],
            'inventory' => $data['inventory'],
            'description_long' => $data['description_long'],
            'description_short' => $data['description_short'],
            'category' => $data['category'],
            'code' => $data['code'],
            'photos' => $productImgNew
        ];
        try {
            $productUpdate->update($values);
            $success = 'Update products success';
            $data['product']->storeAs('public/images/products', $productImgNew);
            Storage::delete($productImgOld);
            return redirect()
                ->route('products.index')
                ->with('success',$success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Update product failed';
            return back()->with('error',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        try
        {
            $product->delete();
            if(Storage::exists('public/images/products/'.$product->photos)) {
                Storage::delete('public/images/products/'.$product->photos);
            }
            $success = 'Delete product success';
            return redirect()
                ->route('products.index')
                ->with('success',$success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Delete product failed';
            return back()->with('error',$error);
        }


    }
}
