<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\myOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/admin/categories', CategoryController::class)->names([
    'index' => 'admin.categories.index',
    'create' => 'admin.categories.create',
    'store' => 'admin.categories.store',
    'show' => 'admin.categories.show',
    'edit' => 'admin.categories.edit',
    'update' => 'admin.categories.update',
    'destroy' => 'admin.categories.destroy',
]);
Route::resource('/admin/products', ProductController::class);
Route::resource('/admin/users', UserController::class);


Route::resource('/', HomeController::class);
Route::resource('/home', HomeController::class);

Route::resource('/login', LoginController::class);
Route::resource('/register', RegisterController::class);

Auth::routes();

Route::resource('/shop', ShopController::class);

Route::resource('/customer', customerController::class);



Route::resource('myshop/categories', ShopCategoryController::class);


Route::resource('myshop/products', ShopProductController::class)->names([
    'index' => 'myshop.products.index',
    'create' => 'myshop.products.create',
    'store' => 'myshop.products.store',
    'show' => 'myshop.products.show',
    'edit' => 'myshop.products.edit',
    'update' => 'myshop.products.update',
    'destroy' => 'myshop.products.destroy',
]);

Route::resource('/products', ProductViewController::class);


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

Route::resource('/cart', CartController::class);
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');


Route::resource('/orders', OrderController::class);

Route::resource('/myorders', myOrderController::class);
Route::put('/myorders/{order}/cancel', [MyOrderController::class, 'cancel'])->name('myorders.cancel');


