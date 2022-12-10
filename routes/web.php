<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [FrontendController::class, 'viewCategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);
// try product details of tending section
Route::get('/view-prod/{prod_slug}', [FrontendController::class, 'trending_product_view']);

Auth::routes();

Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::post('/add-to-cart', [CartController::class, 'addProduct']);


Route::get('/load_cart_data', [CartController::class, 'cart_count']);

Route::middleware(['auth'])->group(function(){
Route::get('/cart', [CartController::class, 'viewCart']);
Route::post('/delete_cart_item', [CartController::class, 'deleteproduct']);
Route::post('/update_cart', [CartController::class, 'updateCart']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/place_order', [CheckoutController::class, 'place_order']);
Route::get('/my_orders', [UserController::class, 'index']);
Route::get('/view_orders/{id}', [UserController::class, 'view']);
});
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [FrontendController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'add']);
    Route::post('/insert-category', [CategoryController::class, 'insert']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'add']);
    Route::post('/insert-product', [ProductController::class, 'insert']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
    // Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
    Route::get('/admin_dashboard', [DashboardController::class, 'admin_dashboard']);


    
    Route::get('/orders', [OrderController::class, 'orders']);
    Route::get('/admin/view_orders/{id}', [OrderController::class, 'view']);
    Route::put('/update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('/order-history', [OrderController::class, 'orderhistory']);
    Route::get('/users', [DashboardController::class, 'users']);

});