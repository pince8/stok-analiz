<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
//ürün listeleme
    Route::get('/products',[ProductController::class,'index'])->name('products.index');
//ürün ekleme formu
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
//ürün kaydetme
    Route::post('/products',[ProductController::class,'store'])->name('products.store');
//ürün düzenleme formu
    Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
//ürün güncelleme
    Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
//ürün silme
    Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');

});

