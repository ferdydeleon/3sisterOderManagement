<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('user.login');
// })->middleware('auth');

Route::get('/',[UserController::class, 'index'])->middleware('auth');


Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process',[UserController::class, 'process']);
Route::post('/logout',[UserController::class, 'logout']);

//users
Route::get('/register',[UserController::class, 'register']);
Route::post('/register/store',[UserController::class, 'storeUsers']);

//customers
Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer/create', 'create');
    Route::post('/customer/store', 'store');
    Route::get('/customer/list', 'list');
    Route::get('/customer/{id}', 'show');
    Route::put('/customer/{id}', 'update');
    Route::delete('/customer/{id}', 'delete');
});


//order
Route::get('/order/form',[OrderController::class, 'create']);
Route::post('/order/customer',[OrderController::class, 'store']);
Route::get('/orderlist', [OrderController::class, 'orderlist'])->middleware('auth');
Route::get('/orderlist/{id}', [OrderController::class, 'orderlistBY']);


Route::post('/get-product-by-price',[OrderController::class, 'getPrice']);



