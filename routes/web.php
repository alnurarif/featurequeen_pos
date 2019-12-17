<?php

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
    return view('dashboard.show_dashboard');
});

Route::resource('brands','BrandsController');
Route::resource('categories','CategoriesController');
Route::resource('customers','CustomersController');
Route::resource('suppliers','SuppliersController');
Route::resource('products','ProductsController');

Route::post('purchases/getPurchaseProductDetails','ProductPurchasesController@getPurchaseProductDetails');
Route::resource('purchases','ProductPurchasesController');


Route::resource('sales','SalesController');