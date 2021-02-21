<?php

use App\Http\Controllers\Auth\admin\ForgotPasswordController;
use App\Http\Controllers\Auth\admin\LoginController;
use App\Http\Controllers\Auth\admin\ResetPasswordController;
use App\Http\Controllers\Auth\customer\ForgotPasswordController as CustomerForgotPasswordController;
use App\Http\Controllers\Auth\customer\ResetPasswordController as CustomerResetPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
Route::get('get-size/{productId}',[IndexController::class,'getSize']);
Route::get('shopping-cart',[IndexController::class,'shoppingCart']);
Route::get('index/{slug}',[IndexController::class,'showIndexProducts']);
Route::post('/find/{searchString}',[ProductsController::class,'search']);
Route::get('/custom-canvas',[ProductsController::class,'customCanvas']);


// Cart Routes

// Add to Cart Route
Route::get('/add-to-cart/{id}/{sizeId}/{materialId}/{imageId}/{qty}', [
    ProductsController::class,'getAddToCart'
]);

Route::get('/shopping-cart', [
    ProductsController::class,'getCart',
])->name('shopping_cart');
Route::get('/execute-payment',[PaymentController::class,'execute']);

// Delete Product from Cart Route
Route::get('/cart/delete-product/{id}', [ProductsController::class, 'removeCart']);

// Update Product Quantity from Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');    

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/admin/login', 'App\Http\Controllers\Auth\admin\LoginController@showAdminLoginForm');

Route::get('/customer/login', 'App\Http\Controllers\Auth\customer\LoginController@showCustomerLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\admin\RegisterController@showAdminRegisterForm');
Route::get('/register/customer', 'App\Http\Controllers\Auth\customer\RegisterController@showcustomerRegisterForm');

Route::post('/admin/login', 'App\Http\Controllers\Auth\admin\LoginController@adminLogin');
Route::post('/customer/login', 'App\Http\Controllers\Auth\customer\LoginController@customerLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\admin\RegisterController@createAdmin');
Route::post('/register/customer', 'App\Http\Controllers\Auth\customer\RegisterController@createcustomer');
Route::post('/admin/logout',[LoginController::class,'logout']);

Route::get('password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::get('password/email',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset',[CustomerForgotPasswordController::class,'showLinkRequestForm'])->name('customer.password.request');
Route::post('password/email',[CustomerForgotPasswordController::class,'sendResetLinkEmail'])->name('customer.password.email');
Route::post('password/reset/{token}',[CustomerResetPasswordController::class,'showResetForm'])->name('customer.password.reset');
Route::get('/admin', 'App\Http\Controllers\Auth\admin\AdminDashboard@index');
    
Route::get('/customer', 'App\Http\Controllers\Auth\customer\CustomerDashboard@index');    
    


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
