<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\InvoicesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AccountsController::class)->group(function () {
    Route::get('/accout', 'index');
    Route::get('/user', 'detail');
    Route::get('/loadaccount', 'loadaccount');
    Route::post('/createAccount', 'createAccount');
    Route::post('/userupdate', 'update');
});

Route::controller(ProductsController:: class)->group(function(){
    Route::get('productitem','itemProduct');
    Route::get('/ajax-shop','indexuser');
    Route::get('/ajax-shopsearch','search');
});

Route::controller(CartsController:: class)->group(function(){
Route::get('/carts','index');
Route::get('/ajax-addToCart','addTocart');
Route::get('/removecart','remove');
Route::get('/update_carts','update');
});

Route::prefix('/admin')->group(function (){
    Route::get('/accounts', [ProductsController::class, 'accounts']);
    
});

Route::get('/ajax-category',[CategorysController::class,'indexuser'])->name('ajax-category');
Route::get('/ajax-search_order',[InvoicesController::class,'search'])->name('ajax-search_order');

Route::get('/ajax-brands',[BrandController::class,'index'])->name('ajax-brands');



