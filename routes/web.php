<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndexController;
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

Route::get('/',[IndexController::class,'home']);
Route::get('all',[IndexController::class,'categoriesApi']);
Route::get('category/{slug}',[IndexController::class,'showCategoryProducts']);
Route::get('product/{slug}',[IndexController::class,'showProduct']);

//require __DIR__.'/auth.php';
//Auth::routes(['register'=>false]);

