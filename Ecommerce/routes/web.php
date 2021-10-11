<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',[AdminController::class,"index"]);
Route::post('/admin',[AdminController::class,"login"]);
Route::get('admin/signup',[AdminController::class,"signup"]);
Route::post('admin/signup',[AdminController::class,"register"]);
Route::get('admin/forgot',[AdminController::class,"forgot"]);
Route::get('admin/dashboard',[AdminController::class,"dashboard"]);

    Route::group(['middleware'=>'admin_auth'],function(){

Route::get('admin/category/manage/{id?}',[CategoryController::class,"create"]);
Route::get('admin/category/delete/{id}',[CategoryController::class,"destroy"]);
Route::get('admin/category/update_show/{id}',[CategoryController::class,"show_status"]);  
 Route::get('admin/category/status/{id}',[CategoryController::class,"update_status"]);
Route::get('admin/category',[CategoryController::class,"index"]);
Route::post('admin/category/manageprocess',[CategoryController::class,"store"])->name('category.store');
/* Category Crud Operation */
Route::get('admin/product/manage/{id?}',[ProductController::class,"create"]);
Route::get('admin/product',[ProductController::class,"index"]);
/* Category Crud Operation */
Route::get('admin/brand/manage/{id?}',[BrandController::class,"create"]);
Route::get('admin/brand',[BrandController::class,"index"]);
Route::post('admin/brand/manageprocess',[BrandController::class,"store"])->name('brand.store');
Route::get('admin/brand/delete/{id}',[BrandController::class,"destroy"]);
Route::get('admin/brand/status/{id}',[BrandController::class,"update_status"]);
/* Category Crud Operation */
Route::get('admin/color/manage/{id?}',[ColorController::class,"create"]);
Route::get('admin/color',[ColorController::class,"index"]);
Route::get('admin/color/status/{id}',[ColorController::class,"update_status"]);
Route::get('admin/color/delete/{id}',[ColorController::class,"destroy"]);

Route::post('admin/color/manageprocess',[ColorController::class,"store"])->name('color.store');

/* Category Crud Operation */
Route::get('admin/size/manage/{id?}',[SizeController::class,"create"]);
Route::get('admin/size',[SizeController::class,"index"]);
Route::post('admin/size/manageprocess',[SizeController::class,"store"])->name('size.store');
Route::get('admin/size/status/{id}',[SizeController::class,"update_status"]);
Route::get('admin/size/delete/{id}',[SizeController::class,"destroy"]);
/* Category Crud Operation */
Route::get('admin/order/manage/{id?}',[OrderController::class,"create"]);
Route::get('admin/order',[OrderController::class,"index"]);
Route::get('admin/users/{id}', function ($id) {
    
   });
    });