<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CartsController;

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
    Route::post('/createAccount', 'createAccount');
    Route::post('/userupdate', 'update');
});

Route::controller(ProductsController:: class)->group(function(){
    Route::get('productitem','itemProduct');
    Route::get('/ajax-shop','index');
});



Route::get('/ajax-category',[CategorysController::class,'index'])->name('ajax-category');
Route::get('/carts',[CartsController::class,'index'])->name('carts');

Route::get('/ajax-brands',[BrandController::class,'index'])->name('ajax-brands');


