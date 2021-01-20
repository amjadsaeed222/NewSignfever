<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CustomerController;
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
require __DIR__.'/auth.php';
Auth::routes();

Route::get('/dashboard', function ()
{
    return view('dashboard');
    
})->middleware('auth:api')->name('dashboard');

Route::group(['middleware'=>'auth:api'],function(){
    Route::get('/admin/add-customer',[CustomerController::class,'addCustomer']);
    
    Route::match(['get', 'post'], '/admin/add-category',[CategoryController::class,'addCategory'])->middleware('web');
    Route::match(['get', 'post'], '/admin/edit-category/{slug}',[CategoryController::class,'editCategory'])->middleware('web');
    Route::match(['get', 'post'], '/admin/delete-category/{id}',[CategoryController::class,'deleteCategory']);
    Route::get('/admin/view-categories',[CategoryController::class,'viewCategories'])->name('view-categories');
    
    // Admin Products Routes
    Route::match(['get','post'],'/admin/add-material',[ProductsController::class,'addmaterial']);
    Route::match(['get','post'],'/admin/add-product',[ProductsController::class,'addProduct'])->middleware('web');
    
    Route::match(['get','post'],'/admin/edit-product/{slug}',[ProductsController::class,'editProduct'])->middleware('web');
    Route::get('/admin/delete-product/{id}',[ProductsController::class,'deleteProduct']);
    Route::get('/admin/view-products',[ProductsController::class,'viewProducts'])->name('viewproducts');
    Route::get('/admin/delete-product-image/{id}',[ProductsController::class,'deleteProductImage']);

    Route::match(['get', 'post'], '/admin/add-images/{id}',[ProductsController::class,'addImages']);
    Route::get('/admin/delete-alt-image/{id}',[ProductsController::class,'deleteProductAltImage']);

    // Admin Attributes Routes
    Route::match(['get', 'post'], '/admin/add-attributes/{id}',[ProductsController::class,'addAttributes']);
    Route::match(['get', 'post'], '/admin/edit-attributes/{id}',[ProductsController::class,'editAttributes']);
    Route::get('/admin/delete-attribute/{id}',[ProductsController::class,'deleteAttribute']);

});


// Frontend Routes

Route::get('categories',[IndexController::class,'showCategories']);
Route::get('/products/{id}',[IndexController::class,'showAllProducts']);
Route::get('/product/{slug}',[IndexController::class,'showProduct']);

