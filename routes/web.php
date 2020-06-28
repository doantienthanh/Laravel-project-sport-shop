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
Route::get('/admin/FindProduct/delete',"Admin\ManagemetProductController@returnPageDelete");
Route::delete('/admin/deleteProduct/{slug}', 'Admin\ManagemetProductController@deleteProduct');
Route::get('/admin/FindProduct/toEdit',"Admin\ManagemetProductController@returnPageEdit");
Route::get('admin/product/getForm/edit/{id}', 'Admin\ManagemetProductController@getFormEdit');
Route::DELETE('/admin/editProduct/{id}', 'Admin\ManagemetProductController@updateProduct');


// Admin  management user
Route::get('/admin/management/AddMoneyOfUser', 'Admin\ManagemetUserController@returnPagesManagement');
Route::Delete('/admin/managementAddMoney/delete/{id}', 'Admin\ManagemetUserController@deleteAddMoney');
Route::Patch('/admin/managementAddMoney/Accept/{id}','Admin\ManagemetUserController@acceptAddMoney');
Route::get('/admin/management/payments','Admin\ManagemetUserController@getPayment');


//User Product
Route::get('/home/allProduct','User\HomeController@getAllProduct');
Route::get('/home/viewDetailProducts/{slug}','User\ProductController@viewDetails');


// User Cart
Route::get('/home/viewCart/ofUser',"User\ProductController@viewCart");
Route::get('/home/user/product/addtocart/{slug}','User\ProductController@addToCart');
Route::PATCH('/home/user/addQuantityInCart{slug}',"User\ProductController@addQuantity");
Route::PATCH('/home/user/minusQuantityInCart{slug}',"User\ProductController@minusQuantity");
Route::DELETE('/home/user/delete{id}',"User\ProductController@deleteProductInCart");
Route::post('/home/userUseCode',"User\ProductController@useCode");
Route::post('/home/user/paymentProduct',"User\ProductController@order");
// Admin management User
Route::POST('/user/addMoney',"User\ManagementUserController@addMoney");

