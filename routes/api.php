<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CustomerController;
//this line is added by the developer.
use Illuminate\Support\Facades\Auth;
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


Route::group(['middleware'=>'auth:api'],function(){
    
    Route::get('/add-customer',[CustomerController::class,'addCustomer']);
    Route::match(['get', 'post'], '/add-category',[CategoryController::class,'addCategory'])->middleware('web');
    Route::match(['get', 'post'], '/add-new-category',[CategoryController::class,'addNewCategory'])->middleware('web');
    
    Route::match(['get', 'post'], '/edit-category/{slug}',[CategoryController::class,'editCategory'])->middleware('web');
    Route::match(['get', 'post'], '/delete-category/{id}',[CategoryController::class,'deleteCategory']);
    Route::get('/view-categories',[CategoryController::class,'viewCategories'])->name('view-categories');
    
    // Admin Products Routes
    

    Route::get('/', [ProductsController::class,'dashboard']);
    Route::match(['get','post'],'/add-material',[ProductsController::class,'addmaterial']);
    Route::match(['get','post'],'/add-product',[ProductsController::class,'addProduct'])->middleware('web');
    
    Route::match(['get','post'],'/edit-product/{slug}',[ProductsController::class,'editProduct']);
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
    
    Route::match(['get','post'],'/add-size',[ProductsController::class,'AddSize'])->middleware('web');
    Route::match(['get','post'],'/add-size-ajax',[ProductsController::class,'AddSizeAjax'])->middleware('web');
    Route::match(['get','post'],'/view-size',[ProductsController::class,'ViewSize']);
    Route::match(['get','post'],'/edit-size/{id}',[ProductsController::class,'EditSize']);
    Route::get('/delete-size/{id}',[ProductsController::class,'deleteSize']);
    
    
    //Product Material Routes
    Route::match(['get','post'],'/add-material',[ProductsController::class,'AddMaterial']);
    Route::match(['get','post'],'/add-material-ajax',[ProductsController::class,'AddMaterialAjax']);
    Route::match(['get','post'],'/view-material',[ProductsController::class,'ViewMaterial']);
    Route::match(['get','post'],'/edit-material/{id}',[ProductsController::class,'EditMaterial']);
    Route::get('/delete-material/{id}',[ProductsController::class,'deleteMaterial']);
//Index Routes
    Route::match(['get','post'],'/add-index',[ProductsController::class,'addIndex'])->middleware('web');
    Route::match(['get','post'],'/edit-index/{slug}',[ProductsController::class,'editIndex']);
    Route::match(['get','post'],'/delete-index/{id}',[ProductsController::class,'deleteIndex']);
    Route::match(['get','post'],'/view-index',[ProductsController::class,'viewIndex']);


// Cart Page
Route::match(['get', 'post'],'/cart','ProductsController@cart');


// Frontend Routes
// NOT USING THERE, USING THE ONES PRESENT ON web.php



// Add to Cart Route
Route::get('/add-to-cart/{id}/{sizeId}/{materialId}/{imageId}', [
    ProductsController::class,'getAddToCart'
]);

Route::get('/shopping-cart', [
    ProductsController::class,'getCart',
]);

// Delete Product from Cart Route
Route::get('/cart/delete-product/{id}', [ProductsController::class, 'deleteCartProduct']);

// Update Product Quantity from Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');    
});

Route::get('categories',[IndexController::class,'showCategories']);
Route::get('/products/{id}',[IndexController::class,'showAllProducts']);
Route::get('/product/{slug}',[IndexController::class,'showProduct']);

