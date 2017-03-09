<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::resource('stockProducts', 'stock_productsAPIController');

Route::resource('receives', 'receivesAPIController');





Route::resource('companies', 'companyAPIController');









Route::resource('purchase_prices', 'purchase_priceAPIController');

Route::resource('sales_prices', 'SalesPriceAPIController');

Route::resource('salesorderitems', 'salesorderitemAPIController');

Route::resource('salespayments', 'salespaymentsAPIController');

Route::resource('customers', 'customersAPIController');



Route::resource('factories', 'factoriesAPIController');


Route::resource('salesorders', 'salesordersAPIController');

Route::resource('suppliers', 'suppliersAPIController');





Route::resource('produks', 'produkAPIController');







Route::resource('reportsales', 'reportsalesAPIController');

Route::resource('reportinvoices', 'reportinvoiceAPIController');

Route::resource('reportpayments', 'reportpaymentAPIController');