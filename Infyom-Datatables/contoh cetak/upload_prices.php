<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);

// include all files are required
include "includes/connection.php";
// nurul commit

define('FILE_PATH_UPLOAD', $_SERVER['DOCUMENT_ROOT'] . '/');

// company profile
$queryCompany = "SELECT * FROM as_company order by companyID Limit 1";
$sqlCompany = mysqli_query($connect, $queryCompany);
// fetch data
$dtCompany = mysqli_fetch_array($sqlCompany);
$compName = @$dtCompany['companyName'];
$compAddr = @$dtCompany['address'];
$compVill = @$dtCompany['village'];
$compDist = @$dtCompany['district'];
$compCity = @$dtCompany['city'];
$compProv = @$dtCompany['province'];
$compPhone = @$dtCompany['phone'];
$compFax = @$dtCompany['fax'];
$compAddrPrint = @$dtCompany['print_address'];
$compAddrFaktur = @$dtCompany['faktur_address'];
     

// staff detail
$staffID = @$_SESSION['staffID'];
$queryUser = "SELECT lastLogin, photo FROM as_staffs WHERE staffID = '$staffID'";
$sqlUser = mysqli_query($connect, $queryUser);
// fetch data
$dtUser = mysqli_fetch_array($sqlUser);

$queryAuthorizeStaff = "SELECT * FROM as_modules WHERE modulID = '28'";
$sqlAuthorizeStaff = mysqli_query($connect, $queryAuthorizeStaff);
$dataAuthorizeStaff = mysqli_fetch_array($sqlAuthorizeStaff);


if (strpos($dataAuthorizeStaff['authorize'], @$_SESSION['level']) === FALSE){
	echo "Anda tidak berhak akses modul ini. <a href='home.php'>Kembali Ke Halaman Home </a>";
	exit();
}else
{
	if(!empty($_FILES['file_upload']['tmp_name']))
	{
		$fileInfo = pathinfo($_FILES['file_upload']['name']);

		if(@$fileInfo['extension'] === 'xls' || @$fileInfo['extension'] === 'xlsx' || @$fileInfo['extension'] === 'ods')
		{
			if(move_uploaded_file($_FILES['file_upload']['tmp_name'], FILE_PATH_UPLOAD . "files/" . $_FILES['file_upload']['name']))
			{
				if($fileInfo['extension'] === 'ods') $inputFileType = 'OpenDocument';
				else if($fileInfo['extension'] === 'xlsx') $inputFileType = 'Excel2007';
				else $inputFileType = 'Excel5';

				// action disini 
				/** Include PHPExcel IOFactory */
				require_once dirname(__FILE__) . '/includes/PHPExcel/IOFactory.php';

				// Create new PHPExcel object
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load(FILE_PATH_UPLOAD . "files/" . $_FILES['file_upload']['name']);

				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();

				require_once dirname(__FILE__) . '/includes/PHPExcel/Cell.php';
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

				$fields[0] = 'sku';
				for ($col = 3; $col <= $highestColumnIndex; ++$col)
				{  
					$value = $sheet->getCellByColumnAndRow($col, 1)->getValue(); 
					if($value != NULL)
					{
						$exp = explode("(", $value);
						$custName = rtrim($exp[0], "(");
						$custCode = rtrim($exp[1], ")");
						$fields[$col] = array('cCode' => $custCode, 'cName' => $custName);
					}
				}

				$harga = array();
				for ($row = 2; $row <= $highestRow; ++$row)
				{		
					$ar_harga = array();			
					for ($col = 3; $col <= $highestColumnIndex; ++$col)
					{  
						$value = $sheet->getCellByColumnAndRow($col, $row)->getValue(); 
						if($value != NULL)
						{
							$ar_harga[] = array('custCode' => $fields[$col]['cCode'], 'custName' => $fields[$col]['cName'], 'harga' => $value);
						}
					}
					$sku = $sheet->getCellByColumnAndRow(0, $row)->getValue();
					$harga[] = array('sku' => $sku, 'row_price' => $ar_harga);
				}

				if(count($harga) > 0)
				{
					foreach($harga as $key=>$val)
					{
						$sku = $val['sku'];
						foreach($val['row_price'] as $key2 => $value)
						{
							// ambil data id customer			
							$whereCust = ($value['custCode'] !== '' ? 'customerCode = "' .$value['custCode']. '"' : 'lower(customerName) = "' .strtolower($value['custName']). '"');	
							$sqlCust = mysqli_query($connect, "SELECT customerID FROM as_customers where " . $whereCust);
							$dataCust = mysqli_fetch_array($sqlCust);
							$custID = intval($dataCust['customerID']);
							
							// ambil data id produk
							$sqlProd = mysqli_query($connect, "SELECT productID FROM as_products where productCode = '".$sku."'");
							$dataProd = mysqli_fetch_array($sqlProd);
							$produkID = intval($dataProd['productID']);

							if($custID > 0 && $produkID > 0 && $value['harga'] > 0)
							{
								//cek harga untuk sku dan customer tertentu
								$sqlHarga = mysqli_query($connect, "SELECT price FROM as_product_price where productID = '".$produkID."' AND customerID = '".$custID."'");
								if(mysqli_num_rows($sqlHarga) > 0)
									$actPrice = "UPDATE as_product_price set price = '".$value['harga']."' WHERE productID = '".$produkID."' AND customerID = '".$custID."'";
								else
									$actPrice = "INSERT INTO as_product_price (customerID,productID,productCode,price) VALUES '".$custID."', '".$produkID."', '".$value['custCode']."', '".$value['harga']."'";
							}
							mysqli_query($connect, $actPrice);
						}
					}
				}
				
				// show up the text and exit
				header("Location: prices.php?msg=sukses");
				exit();
			}
		}else
		{
			echo "Harus File (.xls) (.xlsx) atau (.ods)";
			exit();
		}
	}
}

?>