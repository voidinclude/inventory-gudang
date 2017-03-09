<?php
Route::get('/', function () {
	return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::group(['middleware' =>['auth', 'roles'], 'roles' => ['spv'] ], function () {
	Route::resource('companies', 'companyController');
	Route::resource('stockProducts', 'stock_productsController');
	Route::resource('receives', 'receivesController');
	Route::resource('purchasePrices', 'purchase_priceController');
	Route::resource('salesPrices', 'SalesPriceController');
	Route::resource('salesorderitems', 'salesorderitemController');

		Route::group(['middleware' =>['auth', 'roles'], 'roles' => ['kasir', 'user'] ], function () {
				Route::resource('salespayments', 'salespaymentsController');
				Route::get('PrintBuktiPembayaran', 'PrintController@PrintBuktiPembayaran');
				Route::get('/ajax-customer', 'ajaxMasterController@ajaxcustomer');
		});

	Route::get('/ajax-payment', 'salespaymentsController@ajaxGetNumber');
	Route::resource('customers', 'customersController');
	Route::resource('factories', 'factoriesController');
	Route::get('/ajax-sales-order', 'salesordersController@ajaxGetNumber');
	Route::resource('suppliers', 'suppliersController');
	// Route::get('/ajax-customer', 'ajaxMasterController@ajaxcustomer');
	Route::get('/ajax-product', 'ajaxMasterController@ajaxproduct');

		Route::group(['middleware' =>['auth', 'roles'], 'roles' => ['sales'] ], function () {
				Route::resource('salesorders', 'salesordersController');
				Route::resource('salesinvoices', 'salesinvoicesController');
				Route::get('PrintSalesInvoice', 'PrintController@PrintSalesInvoice');
				Route::get('PrintSalesOrder', 'PrintController@PrintSalesOrder');
		});

	Route::resource('produks', 'produkController');
	Route::get('/cek-product', 'produkController@cekproduct');

	Route::get('importExport', 'UpdateHargaController@importExport');
	Route::resource('import', 'UpdateHargaController');
	Route::post('ambildata', 'UpdateHargaController@ambildata');
	Route::get('downloadExcel/{type}', 'UpdateHargaController@downloadExcel');
	Route::post('importExcel', 'UpdateHargaController@importExcel');

	Route::resource('reportsales', 'reportsalesController');
	Route::get('sales-order-paging', 'reportsalesController@pagination');
	Route::get('sales-order-report', 'reportsalesController@printReport');

	Route::resource('reportinvoices', 'reportinvoiceController');
	Route::get('sales-invoice-paging', 'reportinvoiceController@pagination');
	Route::get('sales-invoice-report', 'reportinvoiceController@printReport');

	Route::resource('reportpayments', 'reportpaymentController');
	Route::get('sales-payment-paging', 'reportpaymentController@pagination');
	Route::get('sales-payment-report', 'reportpaymentController@printReport');
});