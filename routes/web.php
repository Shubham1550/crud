<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/index',[CategoryController::class,'index'])->name('index');
Route::post('/store',[CategoryController::class,'store'])->name('store');
Route::get('/table',[CategoryController::class,'table'])->name('table');
Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
Route::get('/update/{id}',[CategoryController::class,'update'])->name('update');
Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete');

//admin
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

//categories
Route::get('/categories/create',[CategoriesController::class,'create'])->name('category.create');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('category.store');
Route::get('/categories/index',[CategoriesController::class,'index'])->name('category.index');
Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('category.update');
Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('category.delete');

//product
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

//color
Route::get('/color/create',[ColorController::class,'create'])->name('color.create');
Route::post('/color/store',[ColorController::class,'store'])->name('color.store');
Route::get('/color/index',[ColorController::class,'index'])->name('color.index');
Route::get('/color/edit/{id}',[ColorController::class,'edit'])->name('color.edit');
Route::post('/color/update/{id}',[ColorController::class,'update'])->name('color.update');
Route::get('/color/delete/{id}',[ColorController::class,'delete'])->name('color.delete');

//brand
Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand/index',[BrandController::class,'index'])->name('brand.index');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

//review
Route::get('/review/index',[ReviewController::class,'index'])->name('review.index');

//order
Route::get('/order/index',[OrderController::class,'index'])->name('order.index');

//front
Route::get('/',[FrontController::class,'index'])->name('front.index');
Route::get('/about',[FrontController::class,'about'])->name('front.about');
Route::get('/shop',[FrontController::class,'shop'])->name('front.shop');
Route::get('/shop_single',[FrontController::class,'shop_single'])->name('front.shop_single');
Route::get('/contact',[FrontController::class,'contact'])->name('front.contact');
Route::get('/cart',[FrontController::class,'cart'])->name('front.cart');
Route::get('/checkout',[FrontController::class,'checkout'])->name('front.checkout');
Route::get('/thankyou',[FrontController::class,'thankyou'])->name('front.thankyou');



