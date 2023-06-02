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


Route::get('/register',[UserController::class, 'register']);
Route::post('/register/store',[UserController::class, 'storeUsers']);


Route::get('/customer/form',[CustomerController::class, 'addCustomersForm']);


Route::get('/order/form',[CustomerController::class, 'addOrderForm']);



Route::get('/orderlist', [OrderController::class, 'orderlist'])->middleware('auth');
Route::get('/orderlist/{id}', [OrderController::class, 'orderlistBY']);

