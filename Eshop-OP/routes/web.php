<?php

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
    return view('home');
});
Route::get('/shop', function () {
    return view('shop');
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
Route::get('/productdetail', function () {
    return view('productdetail');
});

