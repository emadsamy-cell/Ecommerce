<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\HomeShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WishListController;
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

Route::resource('/',homeController::class)->names([
    'index' => 'home' ,
    'show' => 'show-products'
]);

Route::resource('HomeProduct' , HomeProductController::class);
Route::resource('HomeShop', HomeShopController::class);
Route::resource('WishList', WishListController::class);
Route::get('Cart/{id}/{count}' , [CartController::class , 'add'])->name('addToCart');
Route::get('Cart/{id}}' , [CartController::class , 'delete'])->name('deleteFromCart');
Route::post('Cart/{id}' , [CartController::class , 'addMany'])->name('addManyToCart');
Route::resource('cart' , CartController::class);
Route::resource('checkout', CheckoutController::class);


Route::middleware('Admin')->group(function(){

    Route::resource('admin', AdminController::class);
    Route::resource('AdminUser' , AdminUserController::class);
    Route::resource('AdminProduct', AdminProductController::class);
    Route::resource('AdminCategory' , AdminCategoryController::class);


});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
