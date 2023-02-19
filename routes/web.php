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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');


Route::resource('/brands', 'brandController')->middleware('auth');
Route::resource('/groups', 'GroupController')->middleware('auth');
Route::resource('/account_types', 'AccountTypeController')->middleware('auth');
Route::resource('/accounts', 'AccountController')->middleware('auth');

Route::get('/product_bulk_update', 'ProductController@product_bulk_update')->name('product_bulk_update');


Route::resource('/product_types', 'ProductTypeController')->middleware('auth');
Route::resource('/products', 'ProductController')->middleware('auth');

Route::resource('/suppliers', 'SupplierController')->middleware('auth');
Route::resource('/purchases', 'PurchaseController')->middleware('auth');
Route::resource('/customers', 'CustomerController')->middleware('auth');
Route::resource('/sales', 'SaleController')->middleware('auth');
Route::post('/addNewRow', 'SaleController@addNewRow')->middleware('auth');
Route::post('/single_sell_item', 'SaleController@single_sell_item');

Route::resource('/sales_returns', 'SalesReturnController')->middleware('auth');
Route::get('/sr_form/{id}', 'SalesReturnController@sr_form')->name('sales_returns.sr_form');


Route::get('/customer_pay/{id}', 'CustomerController@customer_pay')->name('customer_pay');

Route::post('/customer_paid', 'CustomerController@customer_paid')->name('customer_paid');


Route::get('/supplier_pay/{id}', 'SupplierController@supplier_pay')->name('supplier_pay');

Route::post('/supplier_paid', 'SupplierController@supplier_paid')->name('supplier_paid');


Route::get('/sales_report', 'Report@sales_report')->middleware('auth');
Route::get('get_sales_data', 'Report@get_sales_data')->name('get_sales_data');

Route::get('/purchases_report', 'Report@purchases_report')->middleware('auth');
Route::get('get_purchases_data', 'Report@get_purchases_data')->name('get_purchases_data');


Route::get('/customer_reports', 'Report@customer_reports')->name('customer_reports');
Route::get('get_customers_data', 'Report@get_customers_data')->name('get_customers_data');

Route::get('/supplier_reports', 'Report@supplier_reports')->name('supplier_reports');
Route::get('get_suppliers_data', 'Report@get_suppliers_data')->name('get_suppliers_data');


Route::get('/stock_report', 'Report@stock_report')->middleware('auth');
Route::get('get_stock_data', 'Report@get_stock_data')->name('get_stock_data');

Route::get('/debit_credit', 'Report@debit_credit')->middleware('auth');
Route::get('get_debit_credit', 'Report@get_debit_credit')->name('get_debit_credit');

Route::get('/account_month', 'Report@account_month')->middleware('auth');
Route::get('get_account_month', ' @get_account_month')->name('get_account_month');




Route::resource('/settings', 'SettingController')->middleware('auth');


