<?php
include "header.php";

// if session is null, showing up the text and exit
if (@$_SESSION['staffID'] == '' && @$_SESSION['email'] == '')
{
	// show up the text and exit
	header("Location: logout.php");
	exit();
}

else{
	
	ob_start();
	require ("includes/html2pdf/html2pdf.class.php");
	
	$act = @$_GET['act'];
	$module = @$_GET['module'];
	
	if ($module == 'out' && $act == 'print')
	{
		$invoiceID = @$_GET['invoiceID'];
		$invoiceNo = @$_GET['invoiceNo'];
		$doNo = @$_GET['doNo'];
		$now = date('Y-m-d');
		
		$filename="faktur_penjualan.pdf";
		$content = ob_get_clean();
		
		// showing up the main invoice data
		$queryMain = "SELECT * FROM as_sales_transactions WHERE invoiceID = '$invoiceID' AND invoiceNo = '$invoiceNo'";
		$sqlMain = mysqli_query($connect, $queryMain);
		$dataMain = mysqli_fetch_array($sqlMain);
		
		$invoiceDate = tgl_indo2($dataMain['invoiceDate']);
		
		if ($dataMain['expiredPayment'] == '0000-00-00')
		{
			$expiredPayment = "-";
		}
		else
		{
			$expiredPayment = tgl_indo2($dataMain['expiredPayment']);
		}
		
		if ($dataMain['paymentType'] == '1')
		{
			$paymentType = "Tunai";
		}
		else
		{
			$paymentType = "Termin";
		}
		
		if ($dataMain['ppnType'] == '1')
		{
			$ppnType = "PPN";
		}
		else
		{
			$ppnType = "No PPN";
		}
		
		$ppn = rupiah($dataMain['ppn']);
		$total = rupiah($dataMain['total']);
		$basic = rupiah($dataMain['basic']);
		$discount = rupiah($dataMain['discount']);
		$grandtotal = rupiah($dataMain['grandtotal']);
		$content = "<table style='padding-bottom: 10px; width: 240mm;'>
						<tr valign='top'>
							<td style='width: 150mm;' valign='middle'>
								<div style='font-weight: bold; padding-bottom: 5px; font-size: 20pt;'>
									" . $compName . "
								</div>
							</td>
							<td style='width: 83mm;'></td>
						</tr>
						<tr valign='top'>
							<td><span style='font-size: 8pt;'>$compAddrFaktur</span>
							</td>
							<td>
								<span style='font-size: 20pt;'><b>FAKTUR PENJUALAN</b></span>
							</td>
						</tr>
					</table>";
		$content .= "
					<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Nomor Faktur</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 35mm;'>".@$dataMain['invoiceNo']."</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 5mm;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Surat Jalan</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 35mm;'>".$dataMain['doNo']."</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 15mm;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Kepada Yth,</td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>".$invoiceDate."</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>".$dataMain['customerName']."</td>
						</tr>
						<tr valign='top'>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tipe Bayar</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>".$paymentType."</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>".$dataMain['customerAddress']."</td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Jatuh Tempo</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>".$expiredPayment."</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
						</tr>
					</table>
					<br /><br />";
		$content .= "<table cellpadding='0' cellspacing='0' style='width: 240mm; border-bottom: 1px solid #000;'>
						<tr>
							<th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO.</th>
							<th style='width: 25mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: center;'>SKU</th>
							<th style='width: 130mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NAMA PRODUK</th>
							<th style='width: 25mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: center;'>HARGA</th>
							<th style='width: 15mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: center;'>QTY</th>
							<th style='width: 35mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: right;'>SUBTOTAL</th>
						</tr>";
						
						// showing the do detail
						$queryDoDetail = "SELECT * FROM as_detail_do WHERE doNo = '$doNo' ORDER BY doID ASC";
						$sqlDoDetail = mysqli_query($connect, $queryDoDetail);
						
						// fetch data
						$i = 1;
						while ($dtDoDetail = mysqli_fetch_array($sqlDoDetail))
						{
							$productName = chunk_split($dtDoDetail['productName'], 50, "<br>");
							$productSKU = $dtDoDetail['sku'];
							$subtotal = rupiah($dtDoDetail['deliveredQty'] * $dtDoDetail['price']);
							$price = rupiah($dtDoDetail['price']);
							
							$content .= "
									<tr valign='top'>
										<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$i</td>
										<td style='padding: 2px 0px 2px 0px; font-size: 12pt;text-align: center;'>$productSKU</td>
										<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$productName</td>
										<td style='padding: 2px 30px 2px 0px; font-size: 12pt; text-align: right;'>$price</td>
										<td style='padding: 2px 0px 2px 0px; font-size: 12pt; text-align: center;'>$dtDoDetail[deliveredQty]</td>
										<td style='padding: 2px 0px 2px 0px; font-size: 12pt; text-align: right;'>$subtotal</td>
									</tr>
							";
							
							$i++;
						}
			$content .= 
						"
						
					</table>
					<br />
					<table cellpadding='0' cellspacing='0' style='width: 230mm;'>
						<tr valign='top'>
							<td style='padding: 5px 0px 5px 0px; font-size: 12pt; vertical-align: top; text-align: center; width: 150mm; text-decoration: underline;'>
								<br>HORMAT KAMI,<br /><br /><br /><br />Administrasi
							</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 12pt; text-align: right; width: 100mm;'>
								<table>
									<tr>
										<td style='width: 43mm; text-align: right;'>Jumlah Harga Jual</td>
										<td style='width: 5mm;'>: Rp.</td>
										<td style='text-align: right; width: 25mm;'>$total</td>
									</tr>
									<tr>
										<td style='text-align: right;'>Potongan</td>
										<td>: Rp.</td>
										<td style='text-align: right;'>$discount</td>
									</tr>
									<tr>
										<td style='text-align: right;'>Total</td>
										<td>: Rp.</td>
										<td style='text-align: right;'><b>$grandtotal</b></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					";
	}
	
	ob_end_clean();
	// conversion HTML => PDF
	
	try
	{
		$html2pdf = new HTML2PDF('L', array('250', '180'),'fr', false, 'ISO-8859-15',array(2, 2, 2, 2)); //setting ukuran kertas dan margin pada dokumen anda
		//$html2pdf->setModeDebug();
		$html2pdf->addFont('freesansb', '', 'freesansb.php');// jenis font yg digunakan
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
	
}
?>