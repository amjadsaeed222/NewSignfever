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

Route::get('/',function()
{
    return view('auth/login');
});
Route::get('/admin',[ProductsController::class,'viewProducts'])->middleware('auth');
/*
Route::get('/dashboard', function ()
{
    return view('dashboard');
    
})->middleware(['auth'])->name('dashboard');
*/
//require __DIR__.'/auth.php';
//Auth::routes(['register'=>false]);
Route::get('all',[IndexController::class,'categoriesApi']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/view-products',[ProductsController::class,'viewProducts'])->middleware('auth')->name('view-products');
