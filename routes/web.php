<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkLogin;
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

// REGISTER
Route::POST('/SendCodeToUsers',"Auth\RigisterController@sendCodeRegister");
Route::GET('/getPageRegister',"Auth\RigisterController@getPageRegister");
Route::POST('/users/registerAccount',"Auth\RigisterController@registerAccount");

// Admin
Route::get('/admin/dashboard', "Admin\DashboardContronller@index")->middleware(checkLogin::class);

// Admin management Database
Route::GET('/admin/getAllCompany','Admin\DataController@returnAllCompany')->middleware(checkLogin::class);
Route::POST('/admin/addCompany','Admin\DataController@addCompany')->middleware(checkLogin::class);
Route::DELETE('/admin/deleteCompany/{id}','Admin\DataController@deleteCompany')->middleware(checkLogin::class);

Route::GET('/admin/getAllCategory','Admin\DataController@returnAllCategory')->middleware(checkLogin::class);
Route::POST('/admin/addCategory','Admin\DataController@addCategory')->middleware(checkLogin::class);
Route::DELETE('/admin/deleteCategory/{id}','Admin\DataController@deleteCategory')->middleware(checkLogin::class);

Route::GET('/admin/getAllSize','Admin\DataController@returnAllSize')->middleware(checkLogin::class);
Route::POST('/admin/addSize','Admin\DataController@addSize')->middleware(checkLogin::class);
Route::DELETE('/admin/deleteSize/{id}','Admin\DataController@deleteSize')->middleware(checkLogin::class);
// Admin management Product
Route::get('/admin/Product/Create', "Admin\ManagemetProductController@getFormAdd")->middleware(checkLogin::class);
Route::post('/admin/product/addProducts', "Admin\ManagemetProductController@createProduct")->middleware(checkLogin::class);
Route::get('/admin/FindProduct/delete',"Admin\ManagemetProductController@returnPageDelete")->middleware(checkLogin::class);
Route::delete('/admin/deleteProduct/{slug}', 'Admin\ManagemetProductController@deleteProduct')->middleware(checkLogin::class);
Route::get('/admin/FindProduct/toEdit',"Admin\ManagemetProductController@returnPageEdit")->middleware(checkLogin::class);
Route::get('admin/product/getForm/edit/{id}', 'Admin\ManagemetProductController@getFormEdit')->middleware(checkLogin::class);
Route::DELETE('/admin/editProduct/{id}', 'Admin\ManagemetProductController@updateProduct')->middleware(checkLogin::class);
Route::GET('/admin/getAllProducts','Admin\ManagemetProductController@returnAllProducts')->middleware(checkLogin::class);

// Admin  management user
Route::GET('/admin/getAllUsers',"Admin\ManagemetUserController@returnAllUsers")->middleware(checkLogin::class);
Route::DELETE('/admin/deleteUser/{id}',"Admin\ManagemetUserController@deleteUsers")->middleware(checkLogin::class);
// Admin management Order
Route::get('/admin/management/AddMoneyOfUser', 'Admin\ManagemetUserController@returnPagesManagement')->middleware(checkLogin::class);
Route::Delete('/admin/managementAddMoney/delete/{id}', 'Admin\ManagemetUserController@deleteAddMoney')->middleware(checkLogin::class);
Route::Patch('/admin/managementAddMoney/Accept/{id}','Admin\ManagemetUserController@acceptAddMoney')->middleware(checkLogin::class);
Route::get('/admin/management/payments','Admin\ManagemetUserController@getPayment')->middleware(checkLogin::class);
Route::POST('/user/addMoney',"User\ManagementUserController@addMoney")->middleware(checkLogin::class);
Route::GET('/admin/viewDetail/Payments/{id}/{ida}',"Admin\ManagemetUserController@viewDetailPayment")->middleware(checkLogin::class);
Route::POST('/admin/orderProductsToUsers/{id}',"Admin\ManagemetUserController@adminOrderToUsers")->middleware(checkLogin::class);

//User Product
Route::get('/home/allProduct','User\HomeController@getAllProduct');
Route::get('/home/viewDetailProducts/{slug}','User\ProductController@viewDetails');
Route::get('/home/sortAscending/Product','User\ProductController@sortAscending');
Route::get('/home/sortDescending/Product','User\ProductController@sortDescending');
Route::get('/userView/{id}','User\HomeController@viewProductByCategory');
// user search
Route::GET('/home/user/searchProduct','User\ProductController@searchProduct');

// User Cart
Route::get('/home/viewCart/ofUser',"User\ProductController@viewCart");
Route::get('/home/user/product/addtocart/{slug}','User\ProductController@addToCart');
Route::PATCH('/home/user/addQuantityInCart{slug}',"User\ProductController@addQuantity");
Route::PATCH('/home/user/minusQuantityInCart{slug}',"User\ProductController@minusQuantity");
Route::DELETE('/home/user/delete{id}',"User\ProductController@deleteProductInCart");
Route::post('/home/userUseCode',"User\ProductController@useCode");
Route::post('/home/user/paymentProduct',"User\ProductController@order");


