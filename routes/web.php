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
use App\Http\Controllers\ForgotPassword\ForgotPasswordController;
use App\Http\Controllers\ResetPassword\ResertPasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Slider\SliderController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Upload\PhotoProductController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\YourCart\YourCartController;
use App\Http\Controllers\Purchase\PurchaseController;
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

//Forgot Password
Route::get('/forgot_password',[ForgotPasswordController::class,'showFormForgotPassword'])->name('forgot_password.get');
Route::post('/forgot_password',[ForgotPasswordController::class,'submitFormForgotPassword'])->name('forgot_password.post');

//Reset passsword
Route::get('/reset_password/{token}',[ResertPasswordController::class,'showFormResetPassword'])->name('reset_password.get');
Route::post('/reset_password',[ResertPasswordController::class,'submitFormResetPassword'])->name('reset_password.post');

//Dashboard
Route::middleware('admin')->get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//Upload photo product
Route::post('/upload/photo_product',[PhotoProductController::class,'uploadPhotoProduct'])->name('upload_photo');

//Purchase product
Route::get('/purchase/{data}',[PurchaseController::class,'showFormPurchaseProduct'])->name('form_purchase_product');
Route::post('/purchase',[PurchaseController::class,'submitPurchaseProduct'])->name('submit_purchase_product');

Route::resource('order',OrderController::class);



