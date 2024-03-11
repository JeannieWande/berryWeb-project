<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

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

Route::view('/', 'welcome');

Route::get('admin', function(){
    return view('admin/admin_dashboard');
});

Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
Route::post('/category', [CategoriesController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
