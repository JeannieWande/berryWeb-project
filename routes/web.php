<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;



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


Route::get('/admin', function(){
    return view('admin/admin_dashboard');
});
Route::get('/',[homepageController::class, 'index'])->name('welcome');
Route::get('modal/{id}',[homepageController::class, 'popup']);

Route::get('admin/category', [CategoriesController::class, 'adminIndex'])->name('adminCatIndex');
Route::post('admin/category', [CategoriesController::class, 'store']);
Route::delete('admin/category/{id}', [CategoriesController::class, 'adminDestroy'])->name('adminCatDestroy');
Route::put('admin/category/{id}', [CategoriesController::class, 'adminUpdate'])->name('adminCatUpdate');
Route::get('admin/category/{id}', [CategoriesController::class, 'adminEdit'])->name('adminCatEdit');


Route::get('admin/product', [ProductController::class, 'adminProIndex'])->name('adminProductIndex');
Route::post('admin/product', [ProductController::class, 'store'])->name('adminProductStore');
Route::delete('admin/product/{id}', [ProductController::class, 'adminProDestroy'])->name('adminProductDestroy');
Route::put('admin/product/{id}', [ProductController::class, 'adminProUpdate'])->name('adminProductUpdate');
Route::get('admin/product/{id}', [ProductController::class, 'adminProEdit'])->name('adminProductEdit');

Route::get('/singleProductPage/{id}',[ProductController::class, 'singleProductPage']);
Route::get('/displayproduct/{id}',[ProductController::class, 'displayProduct']);




Route::get('/categoryProducts/{id}',[ProductController::class, 'categoryProducts']);

Route::get('/cart',[CartController::class, 'show'])->name('cart.show');
Route::post('/cart',[CartController::class, 'addToCart'])->name('addToCart');
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::delete('/cart/{id}',[CartController::class, 'destroy'])->name('cart.delete');


Route::middleware('auth.checkout' )->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::delete('/order', [OrderController::class, 'destroy'])->name('order.destroy');
  

    
});




Route::middleware(['auth', 'verified'])->get('/dashboard', [homepageController::class, 'index'])->name('dashboard');

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
