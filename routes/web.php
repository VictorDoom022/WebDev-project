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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/accessDenied',  [App\Http\Controllers\AccessDeniedController::class, 'index'])->name('accessDenied');

Route::get('/seller',  [App\Http\Controllers\SellerController::class, 'index'])->name('seller')->middleware('auth');

Route::delete('/seller/{id}',  [App\Http\Controllers\SellerController::class, 'destroy'])->middleware('auth');

Route::get('/seller/addProduct',  [App\Http\Controllers\addProductController::class, 'index'])->name('addProduct')->middleware('auth');

Route::get('/seller/editProduct/{id}',  [App\Http\Controllers\editProductController::class, 'show'])->name('editProduct')->middleware('auth');

Route::post('/seller/editProduct/{id}',  [App\Http\Controllers\editProductController::class, 'edit'])->name('editProduct')->middleware('auth');

Route::post('/seller/addProduct',  [App\Http\Controllers\addProductController::class, 'store'])->name('addProduct')->middleware('auth');

Route::get('/customer',  [App\Http\Controllers\CustomerController::class, 'index'])->name('customer')->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('auth');

Route::delete('/admin/{id}', [App\Http\Controllers\AdminController::class, 'destroy']);