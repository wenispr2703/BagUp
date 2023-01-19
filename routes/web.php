<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('show/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('show');
Route::get('edit/{order}', [App\Http\Controllers\OrderController::class, 'edit'])->name('edit');
Route::put('edit/{order}', [App\Http\Controllers\OrderController::class, 'update'])->name('update');

Route::post('/addcustom', [App\Http\Controllers\OrderController::class, 'addcustom'])->name('addcustom');
Route::get('create', [App\Http\Controllers\OrderController::class, 'create'])->name('create');
Route::get('myorder', [App\Http\Controllers\OrderController::class, 'myOrder'])->name('myorder');

Route::get('alamat', [App\Http\Controllers\CustomerController::class, 'create'])->name('alamat');
Route::get('confirm', [App\Http\Controllers\CustomerController::class, 'confirm'])->name('confirm');
Route::post('/addalamat', [App\Http\Controllers\CustomerController::class, 'addalamat'])->name('addalamat');
Route::post('/addconfirm', [App\Http\Controllers\CustomerController::class, 'addconfirm'])->name('addconfirm');
Route::delete('/{customer}', [App\Http\Controllers\CustomerController::class, 'hapuscust'])->name('hapuscust');

Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::get('/product/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::get('/product/show/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('show');
Route::delete('/{product}', [App\Http\Controllers\ProductController::class, 'hapusproduct'])->name('hapusproduct');
Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::post('/addcart/{product}', [App\Http\Controllers\ProductController::class, 'addcart'])->name('addcart');

Route::get('/product/payment/{cart}', [App\Http\Controllers\ProductController::class, 'payments'])->name('payments');
Route::get('/payment/{order}', [App\Http\Controllers\OrderController::class, 'payment'])->name('payment');

Route::delete('/{order}', [App\Http\Controllers\OrderController::class, 'hapusorder'])->name('hapusorder');