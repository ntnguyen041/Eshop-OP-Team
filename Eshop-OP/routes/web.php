<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CartsController;
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
})->name('home');

Route::get('/shop', function () {
    return view('shop');
});





Route::controller(ProductsController:: class)->group(function(){
     
});


//account

// thong tin account
//Route::post('/user', [AccountsController::class, 'detail'])->name('user');


Route::get('/TaiKhoan',function(){
    return view('userdetail');
});
Route::get('/product/{id}',function(){
    return view('productdetail');
});

Route::get('/register',function(){
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/register', function () {
    return view('register');
});
 
Route::get('/content', function () {
    return view('content');
});
Route::get('/product/create', function () {
    return view('product/create');
});
Route::prefix('/admin')->group(function (){
    
    Route::get('/create', [ProductsController::class, 'create'])->name('admin.create');
    Route::get('/', [ProductsController::class, 'index'])->name('admin.index');
    Route::get('/{id}', [ProductsController::class, 'show'])->name('admin.show');
    Route::post('/', [ProductsController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('admin.edit');
    Route::patch('/{id}', [ProductsController::class, 'update'])->name('admin.update');
    Route::delete('/{id}', [ProductsController::class, 'destroy'])->name('admin.destroy');
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

