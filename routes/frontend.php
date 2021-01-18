<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductsController;
use App\Models\MainCategory;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::get('/',[IndexController::class,'home']);

// Frontend Routes

Route::get('categories',[IndexController::class,'showCategories']);
Route::get('/products/{id}',[IndexController::class,'showAllProducts']);
Route::get('/product/{slug}',[IndexController::class,'showProduct']);