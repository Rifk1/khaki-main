<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Models\Order;
use App\Models\OrderItem;

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

Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);
Route::get('prodview/{slug}', [FrontendController::class, 'productview2']);
Route::get('product-list', [FrontendController::class, 'productlistajax']);
Route::post('searcproduct', [FrontendController::class, 'searcProduct']);


Auth::routes();


Route::get('load-pay-alert', [FrontendController::class, 'payalert']);
Route::get('load-cart-data', [CartController::class, 'cartload']);
Route::get('load-hati-data', [WishlistController::class, 'hatiload']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);
Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('hapus-wishlist', [WishlistController::class, 'deleteWishlist']);

Route::middleware(['auth'])->group(function () {
    // Route::match(['get', 'post'], '/add-to-cart', [CartController::class, 'addProduct']);
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::post('pembayaran/{id}', [UserController::class, 'pembayaran']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-orders/{id}', [UserController::class, 'viewOrder']);
    Route::get('wishlist', [WishlistController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.index');
    // });
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('load-order-data', [OrderController::class, 'orderload']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-prod/{id}', [CategoryController::class, 'edit']);
    // Route::resource('categories', [CategoryController::class]);


    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-products', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('user', [FrontendController::class, 'users']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/tampilan-pesanan/{id}', [OrderController::class, 'view']);
    Route::put('update-pesanan/{id}', [OrderController::class, 'updatePesanan']);
    Route::get('riwayat-pesanan', [OrderController::class, 'riwayatPesanan']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-users/{id}', [DashboardController::class, 'viewUser']);
});
