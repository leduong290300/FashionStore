<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\Categories\CategoriesRequest;
class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('pages.manageCategory.categories_index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.manageCategory.categories_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Categories\CategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $data = $request->validated();
        $categories = new Categories();
        $categoriesImg = time().'_'.$data['banner']->getClientOriginalName();
        try
        {
            $categories->create([
                'title' => $data['title'],
                'name' => $data['name'],
                'image' => $categoriesImg
            ]);
            $data['banner']->storeAs('public/images/banner', $categoriesImg);
            $success = 'Post category success';
            return redirect()->route('categories.index')
                ->with('success',$success);
        }
        catch (\Exception $e)
        {
            \Log::error($e);
            $error = 'Post category fail';
        }
        return back()
            ->with('error',$error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::all();
        $products = Products::where('category',$id)
            ->orderBy('price','DESC')
            ->get();
        return view('pages.shops',[
            'products' => $products,
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
        $category = Categories::findOrFail($id);
        return view('pages.manageCategory.category_edit')
            ->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Categories\CategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $data = $request->validated();
        $category = Categories::findOrFail($id);
        $categoriesImgNew = time().'_'.$data['banner']->getClientOriginalName();
        $categoriesImgOld = Storage::files('public/images/banner',$category->image);
        try
        {
            $category->update([
                'title' => $data['title'],
                'name' => $data['name'],
                'image' => $categoriesImgNew
            ]);
            $data['banner']->storeAs('public/images/banner', $categoriesImgNew);
            $success = 'Update category success';
            Storage::delete($categoriesImgOld);
            return redirect()->route('categories.index')
                ->with('success',$success);

        }
        catch (\Exception $e)
        {
            \Log::error($e);
            $fail = 'Update category fail';
        }
        return back()->with('error',$fail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        try
        {
            $category->delete();
            if(Storage::exists('public/images/banner/'.$category->image)) {
                Storage::delete('public/images/banner/'.$category->image);
            }
            $success = 'Delete category success';
            return redirect()->route('categories.index')
                ->with('success',$success);
        }
        catch (\Exception $e)
        {
            \Log::error($e);
            $error = 'Delete category failed';
        }
        return back()->with('error',$error);
    }
}
