<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CustomerController;
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

/* 
Route::get("/admin-login", function(){
    return view('auth/login');
}); */

Route::get('/',[IndexController::class,'home']);
Route::get('all',[IndexController::class,'categoriesApi']);
Route::get('category/{slug}',[IndexController::class,'showCategoryProducts']);
Route::get('product/{slug}',[IndexController::class,'showProduct']);
Route::get('get-size/{productId}',[IndexController::class,'getSize']);
Route::get('shopping-cart',[IndexController::class,'shoppingCart']);
Route::get('index/{slug}',[IndexController::class,'showIndexProducts']);
Route::post('/find/{searchString}',[ProductsController::class,'search']);


//require __DIR__.'/auth.php';
//Auth::routes(['register'=>false]);

//Auth::routes();
/*
Route::get('/login/admin', 'App\Http\Controllers\Auth\admin\LoginController@showAdminLoginForm');
Route::get('/login/customer', 'App\Http\Controllers\Auth\customer\LoginController@showCustomerLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\admin\RegisterController@showAdminRegisterForm');
Route::get('/register/customer', 'App\Http\Controllers\Auth\customer\RegisterController@showcustomerRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\admin\LoginController@adminLogin');
Route::post('/login/customer', 'App\Http\Controllers\Auth\customer\LoginController@customerLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\admin\RegisterController@createAdmin');
Route::post('/register/customer', 'App\Http\Controllers\Auth\customer\RegisterController@createcustomer');

*/

//Route::get('/admin', 'App\Http\Controllers\Auth\admin\AdminDashboard@index');
    
//Route::get('/customer', 'App\Http\Controllers\Auth\customer\CustomerDashboard@index');    
    


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
