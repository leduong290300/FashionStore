<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $products = new Products();
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->size = $data['size'];
        $products->color = $data['color'];
        $products->quanlity = $data['quanlity'];
        $products->description1 = $data['description1'];
        $products->description2 = $data['description2'];
        $products->category = $data['category'];
        $products->code = $data['code'];
        $products->photos = $data['product']->getClientOriginalName();

        try {
            $request->file('product')->storeAs('public/images/products',$data['product']);
            $products->save();
            $msgSuccess = 'Add product success';
            return redirect()
                ->route('products.index')
                ->with('success',$msgSuccess);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        $msgFail = 'Add product failed';
        return back()
            ->with('error',$msgFail);

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('product')->getClientOriginalName();
        $request->file('product')->storeAs('public/images/products',$image);
        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->quanlity = $request->quanlity;
        $product->description1 = $request->description1;
        $product->description2 = $request->description2;
        $product->category = $request->category;
        $product->photos = $image;
        $product->code = $request->code;
        try {
            $product->save();
            $msgSuccess = 'Update product success';
            return redirect()->route('products.index')
                ->with('success',$msgSuccess);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        $msgFail = 'Update product failed';
        return redirect()->route('products.index')
            ->with('error',$msgFail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        try
        {
            $product->delete();
            Storage::delete('public/images/products/'.$product->name);
            $success = 'Delete product success';
            return redirect()->route('products.index')
                ->with('success',$success);
        } catch (\Exception $e)
        {
            \Log::error($e);
            $error = 'Delete product fail';
        }
        return redirect()->route('products.index')
            ->with('error',$error);

    }
}
