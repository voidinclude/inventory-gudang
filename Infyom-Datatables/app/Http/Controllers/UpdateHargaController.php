<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PHPExcel; 
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use PHPExcel_Cell_DataType;
use PHPExcel_Cell_IValueBinder;
use PHPExcel_Cell_DefaultValueBinder;
use DB;
use App\Models\produk;
use App\Models\customers;
use App\Models\salesprice;
use App\updateharga;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
class UpdateHargaController extends Controller
{
    /**
     * Return View file
     *
     * @var array
     */
    public function index()
    {
    	return view('ImportExport');
    }
    public function importExport()
    {
    	return view('ImportExport');
    }

	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $type)
	{
		$customerdata = customers::select(
			'id',
			'customerName',
			\DB::raw("concat(customers.customerName, '_', customers.id) as `name`"),
			'customerCode')->get();
		$joindata = customers::join('sales_prices', 'sales_prices.customerID', '=', 'customers.id')
		->select(
			'customers.id',
			'customers.customerName',
			\DB::raw("concat(customers.customerName, '', customers.id) as `name`"),
			'customers.customerCode',
			'sales_prices.price')->get();
		$datajoin = [];
		$newArray = [];
		$customerID = []; 
		$newArray[] = ['SKU','Nama Produk','Satuan'];
		foreach ($customerdata as $cust) {
			array_push($newArray[0],$cust['name']);
			array_push($customerID,$cust['id']);	
		}


		$data = produk::select(
			'products.productCode',
			'products.ProductName',
			'products.unitText'
			)
		->get();

		$no = 1;
		foreach ($data as $key => $cekout) {
			$newArray[$no]['sku'] = $cekout['productCode'];
			$newArray[$no]['nama'] = $cekout['ProductName'];
			$newArray[$no]['satuan'] = $cekout['unitText'];
			// $newArray[$no]['price'] = $cekout['price'];
			// $newArray[$key]['id'] = $cekout['ids'];
			foreach ($customerdata as $custids) {
				$sales_prices = salesprice::select(
					'price',
					'id'
					)->where('customerID', '=', $custids['id'])
				->where('productCode', '=', $cekout['productCode'])
				->get();
				if ($sales_prices->count() === 0) {
					$newArray[$no][$custids['name']] = '0.00';
				}else{
					$sales_prices = $sales_prices->first();
					$newArray[$no][$custids['name']] = $sales_prices->price;
				}
			}
			$no++;
			
		}
		// foreach ($data as $payment) {
		// 	$newArray[] = $payment->toArray();
		// }
		
		// echo "<pre>";
		// print_r($newArray);
		// echo "</pre>";
		// die();
		return Excel::create('update_example_cek', function($excel) use ($newArray,$data,$customerdata) {
			
			$excel->sheet('mySheet', function($sheet) use ($newArray,$data,$customerdata)
			{
				$sheet->fromArray($newArray, null, 'A1', false, false);
			});
		})->download($type);

	}

	

	public function ambildata(Request $request)
	{
		if($request->hasFile('import_file'))
		{
			$path = $request->file('import_file')->getRealPath();

			$objPHPExcel = PHPExcel_IOFactory::load($path);
			$sheet = $objPHPExcel->getSheet(0);
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$highestRow = $objWorksheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

			$fields[0] = 'sku';
			for ($col = 3; $col <= $highestColumnIndex; ++$col)
			{
				$value = $sheet->getCellByColumnAndRow($col, 1)->getValue();
				if($value != NULL)
				{
					$exp = explode("_", $value);
					$custName = $exp[0];
					$custCode = $exp[1];
					$fields[$col] = array(
						'cCode' => $custCode,
						'cName' => $custName);

				}
			}

			$harga = array();
			for ($row = 2; $row <= $highestRow; ++$row)
			{		
				$sku = $sheet->getCellByColumnAndRow(0, $row)->getValue();		
				for ($col = 3; $col <= $highestColumnIndex; ++$col)
				{  
					$value = $sheet->getCellByColumnAndRow($col, $row)->getValue(); 
					if($value != NULL)
					{
						$harga[] = array(
							'customerID' => $fields[$col]['cCode'],
							'productID' => $sku,
							'productCode' => $sku,
							// 'custName' => $fields[$col]['cName'],
							'price' => $value);
					}
				}
			}
			if(!empty($harga))
			{
				foreach ($harga as $key => $value) {
					$datas = [];
					$data = produk::select(
						'id',
						'productCode',
						'ProductName',
						'unitText'
						)
					->where('productCode', '=', $value['productCode'])
					->get();
					$no = 1;
					foreach ($data as $keys => $values) {
						$datas[$no]['id'] = $values['id'];
						$datas[$no]['code'] = $values['productCode'];
						$no++;
					}
					// echo "<pre>";
					// print_r($datas);
					// die();

					$flight = salesprice::updateOrCreate(
						['customerID' => $value['customerID'],'productID' => $values['id'], 'productCode' => $value['productCode']],
						['price' => $value['price']]
						);
				}
				return back()->with('success','Insert Record successfully.');
			}	
		}
		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}