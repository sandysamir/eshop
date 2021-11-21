<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('dashboard');
Route::get('/categories', [App\Http\Controllers\Frontend\FrontendController::class, 'category'])->name('categories');
Route::get('/viewcategory/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory'])->name('viewcategory');
Route::get('/viewcategory/{cate_slug}/{prod_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewproduct'])->name('viewcategory');
Route::middleware(['auth'])->group(function () {

Route::any('/addcart', [App\Http\Controllers\Frontend\CartController::class, 'add'])->name('addcart');
Route::any('/cart', [App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');
Route::post('/delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'deleteCartItem'])->name('delete-cart-item');
Route::any('/update-qty-item', [App\Http\Controllers\Frontend\CartController::class, 'updateCartItem'])->name('update-qty-item');
Route::any('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');
Route::post('/place-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'placeorder'])->name('place-order');
Route::get('/my-order', [App\Http\Controllers\Frontend\UserController::class, 'allOrders'])->name('my-order');
/////////////wishlist////////////

Route::any('/wishlist', [App\Http\Controllers\Frontend\wishlistController::class, 'wishlist'])->name('wishlist');

});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index'])->name('adminhome');
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::get('/addcategory', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('addcategory');
    Route::post('/savecategory', [App\Http\Controllers\Admin\CategoryController::class, 'save'])->name('savecategory');
    Route::get('/editcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('editcategory');
    Route::any('/updatecategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('updatecategory');
    Route::get('/deletecategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('deletecategory');
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::get('/addproduct', [App\Http\Controllers\Admin\ProductController::class, 'add'])->name('addproduct');
    Route::post('/saveproduct', [App\Http\Controllers\Admin\ProductController::class, 'save'])->name('saveproduct');
    Route::get('/editproduct/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('editproduct');
    Route::any('/updateproduct/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('updateproduct');
    Route::get('/deleteproduct/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('deleteproduct');
    
    
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
