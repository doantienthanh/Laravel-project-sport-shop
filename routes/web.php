<?php

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

Route::get('/', "User\HomeController@index");
Route::get("/{category}","User\HomeController@index");

// LOGIN
Route::post("/userLogin","Auth\LoginController@login");
Route::post('/user-logout','Auth\LoginController@logout');
// Admin
Route::get('/admin/dashboard', "Admin\DashboardContronller@index");
// Admin management Product
Route::get('/admin/Product/Create', "Admin\ManagemetProductController@getFormAdd");
Route::post('/admin/product/addProducts', "Admin\ManagemetProductController@createProduct");
Route::get('/admin/FindProduct/delete',"Admin\ManagemetProductController@getAllProduct");
