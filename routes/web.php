<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

//Waiter
Route::get('/',[OrderController::class,'index'])->name('order.form');
Route::post('/order_submit',[OrderController::class,'submit'])->name('order.submit');
Route::get('/order/{order}/serve',[OrderController::class,'serve'])->name('order.serve');


//Kitchen
Route::resource('dish',DishController::class);
Route::get('/order',[DishController::class,'order'])->name('order.list');
Route::get('/order/{order}/approve',[DishController::class,'approve'])->name('order.approve');
Route::get('/order/{order}/cancel',[DishController::class,'cancel'])->name('order.cancel');
Route::get('/order/{order}/ready',[DishController::class,'ready'])->name('order.ready');

//search
Route::post('/search',[OrderController::class,'search']);

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
    'register'=>false
]);


