<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Logout\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Slider\SliderController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Upload\PhotoProductController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\YourCart\YourCartController;
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

//Home
Route::get('/',[HomeController::class,'index'])->name('home');

//Shop
Route::get('/shops', [ShopController::class, 'index'])->name('shops');

//Blog
Route::resource('blog', BlogController::class);

//About
Route::get('/about',[AboutController::class,'index'])->name('about');

//Contact
Route::get('/contact', [ContactController::class,'index'])->name('contact');

//Category
Route::resource('categories', CategoryController::class);

//Slider
Route::resource('slider', SliderController::class);

//Banner
Route::resource('banner', BannerController::class);

//Product
Route::resource('products', ProductsController::class);

//Search
Route::get('/search', [SearchController::class, 'show'])->name('search');

//Shopping cart
Route::resource('your_cart',YourCartController::class);

//Add to cart
Route::resource('cart',CartController::class);

//Login
Route::get('/account', [LoginController::class, 'index'])->name('index');
Route::post('/account/login', [LoginController::class, 'login'])->name('login');

//Register
Route::get('/account/register', [RegisterController::class, 'create'])->name('create');
Route::post('/account', [RegisterController::class, 'register'])->name('register');

//Logout
Route::post('/account/logout', [LogoutController::class, 'logout'])->name('logout');

//Dashboard
Route::middleware('admin')->get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//Upload photo product
Route::post('/upload/photo_product',[PhotoProductController::class,'uploadPhotoProduct'])->name('upload_photo');

//Order
Route::resource('order',OrderController::class);



