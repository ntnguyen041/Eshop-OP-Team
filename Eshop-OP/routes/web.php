<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\BrandsController;

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
    return view('home');
});
Route::get('/shop', function () {
    return view('shop');
});
// Route::get('/ajax-shop',[ProductsController::class,'index'])->name('ajax-shop');
// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/category', function () {
    return view('category');
});
// Route::get('/register', function () {
//     return view('register');
// });
Route::get('/productdetail', function () {
    return view('productdetail');
});
Route::get('/content', function () {
    return view('content');
});


Route::get('/login', [AccountController::class, 'index'])->name('index');
Route::get('/register', [AccountController::class, 'Register'])->name('Register');

// Route::prefix('accounts')->name('accounts.')->group(function () {
//     Route::get('/login', [AccountController::class, 'index'])->name('index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get('/product-type', [CategorysController::class, 'index'])->name('product-type');
// Route::get('/create-product-type', [CategorysController::class, 'formCategory'])->name('create-product-type');
// Route::post('/create-product-type', [CategorysController::class, 'create'])->name('create');

Route::prefix('/product')->group(function (){
    Route::get('/create', [ProductsController::class, 'create'])->name('product.create');
    Route::get('/', [ProductsController::class, 'index'])->name('product.index');
    Route::get('/{id}', [ProductsController::class, 'show'])->name('product.show');
    Route::post('/', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('product.edit');
    Route::patch('/{id}', [ProductsController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [ProductsController::class, 'destroy'])->name('product.destroy');
});

Route::prefix('/category')->group(function (){
    Route::get('/create', [CategorysController::class, 'create'])->name('category.create');
    Route::get('/', [CategorysController::class, 'index'])->name('category.index');
    Route::get('/{id}', [CategorysController::class, 'show'])->name('category.show');
    Route::post('/', [CategorysController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategorysController::class, 'edit'])->name('category.edit');
    Route::patch('/{id}', [CategorysController::class, 'update'])->name('category.update');
    Route::delete('/{id}', [CategorysController::class, 'destroy'])->name('category.destroy');
});
Route::prefix('/brand')->group(function (){
    Route::get('/create', [BrandsController::class, 'create'])->name('brand.create');
    Route::get('/', [BrandsController::class, 'index'])->name('brand.index');
    Route::get('/{id}', [BrandsController::class, 'show'])->name('brand.show');
    Route::post('/', [BrandsController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('brand.edit');
    Route::patch('/{id}', [BrandsController::class, 'update'])->name('brand.update');
    Route::delete('/{id}', [BrandsController::class, 'destroy'])->name('brand.destroy');
});
