<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PhotoBannerController;
use App\Http\Controllers\PhotoSliderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Upload\PhotoProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('home');

//Category
Route::resource('categories', CategoryController::class);

//Slider content
Route::resource('slider', PhotoSliderController::class);

//Banner
Route::resource('banner', PhotoBannerController::class);

//Product
Route::resource('products', ProductsController::class);

//Shop
Route::get('/shops', [ShopController::class, 'index'])->name('shops');

//Search
Route::get('/search', [SearchController::class, 'show'])->name('search');

//Login
Route::get('/account', [LoginController::class, 'index'])->name('index');
Route::post('/account/login', [LoginController::class, 'login'])->name('login');

//Register
Route::get('/account/register', [RegisterController::class, 'create'])->name('create');
Route::post('/account', [RegisterController::class, 'register'])->name('register');

//Logout
Route::post('/account/logout', [LogoutController::class, 'logout'])->name('logout');

//Upload photo product
Route::post('/upload/photo_product',[PhotoProductController::class,'uploadPhotoProduct'])->name('upload_photo');

Route::get('/about', function () {
	return view('pages.about');
})->name('about');

Route::get('/blog', function () {
	return view('pages.blog');
})->name('blog');

Route::get('/blog_details', function () {
	return view('pages.blog_details');
})->name('blog_details');

Route::get('/contact', function () {
	return view('pages.contact');
})->name('contact');

Route::get('/shops_details', function () {
	return view('pages.shops_details');
})->name('shops_details');

Route::get('/shoping_cart', function () {
	return view('pages.shoping_cart');
})->name('shoping_cart');

Route::get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard')->middleware('admin');
