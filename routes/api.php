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

Route::get('/', function ()
{
    return view('admin.dashboard');
    
})->middleware('auth:api')->name('dashboard');

Route::group(['middleware'=>'auth:api'],function(){
    Route::get('/add-customer',[CustomerController::class,'addCustomer']);
    
    Route::match(['get', 'post'], '/add-category',[CategoryController::class,'addCategory'])->middleware('web');
    Route::match(['get', 'post'], '/edit-category/{slug}',[CategoryController::class,'editCategory'])->middleware('web');
    Route::match(['get', 'post'], '/delete-category/{id}',[CategoryController::class,'deleteCategory']);
    Route::get('/view-categories',[CategoryController::class,'viewCategories'])->name('view-categories');
    
    // Admin Products Routes
    Route::match(['get','post'],'/add-material',[ProductsController::class,'addmaterial']);
    Route::match(['get','post'],'/add-product',[ProductsController::class,'addProduct'])->middleware('web');
    
    Route::match(['get','post'],'/edit-product/{slug}',[ProductsController::class,'editProduct'])->middleware('web');
    Route::get('/delete-product/{id}',[ProductsController::class,'deleteProduct']);
    Route::get('/view-products',[ProductsController::class,'viewProducts'])->name('viewproducts');
    Route::get('/delete-product-image/{id}',[ProductsController::class,'deleteProductImage']);

    Route::match(['get', 'post'], '/add-images/{id}',[ProductsController::class,'addImages']);
    Route::get('/delete-alt-image/{id}',[ProductsController::class,'deleteProductAltImage']);

    // Admin Attributes Routes
    Route::match(['get', 'post'], '/add-attributes/{id}',[ProductsController::class,'addAttributes']);
    Route::match(['get', 'post'], '/edit-attributes/{id}',[ProductsController::class,'editAttributes']);
    Route::get('/delete-attribute/{id}',[ProductsController::class,'deleteAttribute']);
    //Product Sizes Routes
    
    Route::match(['get','post'],'/add-size',[ProductsController::class,'AddSize']);
    Route::match(['get','post'],'/view-size',[ProductsController::class,'ViewSize']);
    Route::match(['get','post'],'/edit-size/{id}',[ProductsController::class,'EditSize']);
    Route::get('/delete-size/{id}',[ProductsController::class,'deleteSize']);
    
    
    //Product Material Routes
    Route::match(['get','post'],'/add-material',[ProductsController::class,'AddMaterial']);
    Route::match(['get','post'],'/view-material',[ProductsController::class,'ViewMaterial']);
    Route::match(['get','post'],'/edit-material/{id}',[ProductsController::class,'EditMaterial']);
    Route::get('/delete-material/{id}',[ProductsController::class,'deleteMaterial']);

    Route::match(['get','post'],'/add-index',[ProductsController::class,'addIndex']);
});


// Frontend Routes

Route::get('categories',[IndexController::class,'showCategories']);
Route::get('/products/{id}',[IndexController::class,'showAllProducts']);
Route::get('/product/{slug}',[IndexController::class,'showProduct']);

