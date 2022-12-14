<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportsController;





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
//Route::get('/shop', function () {
//     //session()->flush();
//     return session()->get('admin');
// })->name('shop');
Route::get('/', function () {
    return view('home');
    // session()->flush();
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/shop', function () {
    return view('shop');
});

// Route::controller(ProductsController:: class)->group(function(){
     
// });


//account

// thong tin account
//Route::post('/user', [AccountsController::class, 'detail'])->name('user');


Route::get('/TaiKhoan',function(){
    return view('userdetail');
})->middleware('checkuser');
Route::get('/product/{id}',function(){
    return view('productdetail');
});

Route::get('/register',function(){
    return view('register');
});



Route::get('/cart', function () {
    return view('cart');
})->middleware('checkuser');
Route::get('/category', function () {
    return view('category');
});
Route::get('orderuser/order', function () {
    return view('orderuser/order');
})->middleware('checkuser');


// Route::get('/register', function () {
//     return view('register');
// });
Route::get('/productdetail', function () {
    return view('productdetail');
});

Route::get('/content', function () {
    return view('content');
});
Route::get('/product/create', function () {
    return view('product/create');
});



Route::get('/login', [AccountController::class, 'index'])->name('index');
Route::get('/register', [AccountController::class, 'Register'])->name('Register');

// Route::prefix('accounts')->name('accounts.')->group(function () {
//     Route::get('/login', [AccountController::class, 'index'])->name('index');
// });



Route::get('/orderuser',[InvoicesController::class,'history'])->name('order.history');
Route::get('orderuser/details/{id}',[InvoiceDetailsController::class,'details'])->name('order.details');

// Route::get('/product-type', [CategorysController::class, 'index'])->name('product-type');
// Route::get('/create-product-type', [CategorysController::class, 'formCategory'])->name('create-product-type');
// Route::post('/create-product-type', [CategorysController::class, 'create'])->name('create');


// Route JIDUY
Route::middleware('checkadmin')->prefix('/admin/product')->group(function (){
    
    Route::get('/create', [ProductsController::class, 'create'])->name('admin.product.create');
    Route::get('/', [ProductsController::class, 'index'])->name('admin.product.index');
    Route::get('/{id}', [ProductsController::class, 'show'])->name('admin.product.show');
    Route::post('/', [ProductsController::class, 'store'])->name('admin.product.store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('admin.product.edit');
    Route::patch('/{id}', [ProductsController::class, 'update'])->name('admin.product.update');
    Route::delete('/{id}', [ProductsController::class, 'destroy'])->name('admin.product.destroy');
});

Route::middleware('checkadmin')->prefix('/admin/category')->group(function (){
    Route::get('/create', [CategorysController::class, 'create'])->name('admin.category.create');
    Route::get('/', [CategorysController::class, 'index'])->name('admin.category.index');
    Route::get('/{id}', [CategorysController::class, 'show'])->name('admin.category.show');
    Route::post('/', [CategorysController::class, 'store'])->name('admin.category.store');
    Route::get('/edit/{id}', [CategorysController::class, 'edit'])->name('admin.category.edit');
    Route::patch('/{id}', [CategorysController::class, 'update'])->name('admin.category.update');
    Route::delete('/{id}', [CategorysController::class, 'destroy'])->name('admin.category.destroy');
});

Route::middleware('checkadmin')->prefix('/admin/brand')->group(function (){
    Route::get('/create', [BrandsController::class, 'create'])->name('admin.brand.create');
    Route::get('/', [BrandsController::class, 'index'])->name('admin.brand.index');
    Route::get('/{id}', [BrandsController::class, 'show'])->name('admin.brand.show');
    Route::post('/', [BrandsController::class, 'store'])->name('admin.brand.store');
    Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('admin.brand.edit');
    Route::patch('/{id}', [BrandsController::class, 'update'])->name('admin.brand.update');
    Route::delete('/{id}', [BrandsController::class, 'destroy'])->name('admin.brand.destroy');
});

Route::get('/orderuser',[InvoicesController::class,'history'])->name('order.history')->middleware('checkuser');
Route::get('/orderuser/details/{id}',[InvoicesController::class,'orderDetail'])->name('order.details')->middleware('checkuser');


Route::middleware('checkadmin')->prefix('/admin/order')->group(function (){
    Route::get('/', [InvoicesController::class, 'index'])->name('admin.order.index');
    Route::get('/pending-approval', [InvoicesController::class, 'orderPendingApproval'])->name('admin.order.orderPendingApproval');
    Route::get('/approval', [InvoicesController::class, 'orderApproval'])->name('admin.order.orderApproval');
    Route::get('/order-delivery', [InvoicesController::class, 'orderDelivery'])->name('admin.order.orderDelivery');
    Route::get('/pending-approval-detail/{id}', [InvoicesController::class, 'orderPendingApprovalDetail'])->name('admin.order.orderPendingApprovalDetail');
    Route::get('/invoice-detail/{id}', [InvoicesController::class, 'invoiceDetail'])->name('admin.order.invoiceDetail');
    Route::patch('/{id}', [InvoicesController::class, 'update'])->name('admin.order.update');
    Route::patch('/approval/{id}', [InvoicesController::class, 'updateDelivery'])->name('admin.order.updateDelivery');
    Route::patch('/order-delivery/{id}', [InvoicesController::class, 'updateSuccesfulDelivery'])->name('admin.order.updateSuccesfulDelivery');
});


route::middleware('checkadmin')->get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.darhboard.index');

Route::middleware('checkadmin')->prefix('/admin/report/product')->group(function (){
    route::get('/', [ReportsController::class, 'index'])->name('admin.report.product.index');
    route::get('/report-from-to-date', [ReportsController::class, 'reportFromToDate'])->name('admin.report.product.reportFromToDate');
});
   

// nguyen account
Route::middleware('checkadmin')->prefix('/admin/account')->group(function (){
    Route::get('/', function () {return view('/admin/account/index');});
    Route::get('/create', function () {return view('/admin/account/create');});
    Route::get('/edit', function () {return view('/admin/account/edit');});

});
Route::middleware('checkadmin')->prefix('/admin/report/user')->group(function (){
    route::get('/', [ReportsController::class, 'list'])->name('admin.report.user.list');
});
Route::middleware('checkadmin')->prefix('/admin/report/sell')->group(function (){
    route::get('/', [ReportsController::class, 'sell'])->name('admin.report.sell.index');
    route::get('/top5', [ReportsController::class, 'top5'])->name('admin.report.sell.top5');
    route::get('/top10', [ReportsController::class, 'top10'])->name('admin.report.sell.top10');
    route::get('/top15', [ReportsController::class, 'top15'])->name('admin.report.sell.top15');
    route::get('/top20', [ReportsController::class, 'top20'])->name('admin.report.sell.top20');
});