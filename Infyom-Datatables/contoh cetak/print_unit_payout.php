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
	
	if ($module == 'payout' && $act == 'print')
	{
		$invoiceNo = @$_GET['invoiceNo'];
		$paymentNo = @$_GET['paymentNo'];
		$paymentID = @$_GET['paymentID'];
		$now = date('Y-m-d');
		
		$filename="bukti_pembayaran.pdf";
		$content = ob_get_clean();
		
		// show the sales transaction
		$querySales = "SELECT * FROM as_sales_transactions WHERE invoiceNo = '$invoiceNo'";
		$sqlSales = mysqli_query($connect, $querySales);
		$dataSales = mysqli_fetch_array($sqlSales);
		
		// show the payment 
		$queryPay = "SELECT * FROM as_sales_payments WHERE invoiceNo = '$invoiceNo' AND paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
		$sqlPay = mysqli_query($connect, $queryPay);
		$dataPay = mysqli_fetch_array($sqlPay);
		
		$queryTotal = "SELECT SUM(total) as total FROM as_sales_payments WHERE invoiceNo = '$invoiceNo' AND paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
		$sqlTotal = mysqli_query($connect, $queryTotal);
		$dataTotal = mysqli_fetch_array($sqlTotal);
		
		// receive
		$receive = $dataTotal['total'] - $dataSales['grandtotal'];
		
		if ($dataPay['payType'] == '1')
		{
			$payType = "TUNAI";
		}
		elseif ($dataPay['payType'] == '2')
		{
			$payType = "TRANSFER";
		}
		elseif ($dataPay['payType'] == '3')
		{
			$payType = "CEK";
		}
		else
		{
			$payType = "GIRO";
		}
		
		$paymentDate = tgl_indo2($dataPay['paymentDate']);
		
		if ($dataPay['payType'] == '1')
		{
			$payType = "Tunai";
		}
		elseif ($dataPay['payType'] == '2')
		{
			$payType = "Transfer";
		}
		elseif ($dataPay['payType'] == '3')
		{
			$payType = "Cek";
		}
		else
		{
			$payType = "Giro";
		}
		
		if ($dataPay['effectiveDate'] == '0000-00-00')
		{
			$effectiveDate = "-";
		}
		else
		{
			$effectiveDate = tgl_indo2($dataPay['effectiveDate']);
		}
		
		$receive = rupiah($dataTotal['total'] - $dataSales['grandtotal']);
		$total = rupiah($dataPay['total']);
		$discount = rupiah($dataBuy['discount']);
		$basic = rupiah($dataBuy['basic']);
		$ppn = rupiah($dataBuy['ppn']);
		$grandtotal = rupiah($dataBuy['grandtotal']);
		
		$totalInvoice = rupiah($dataSales[grandtotal]);
		
		$content = "<table style='padding-bottom: 10px; width: 240mm;'>
						<tr valign='top'>
							<td style='width: 150mm;' valign='middle'>
								<div style='font-weight: bold; padding-bottom: 5px; font-size: 20pt;'>
									$compName
								</div>
							</td>
							<td style='width: 83mm;'></td>
						</tr>
						<tr valign='top'>
							<td><span style='font-size: 8pt;'>$compAddrFaktur</span>
							</td>
							<td>
								<span style='font-size: 20pt;'><b>BUKTI PEMBAYARAN</b></span>
							</td>
						</tr>
					</table>
					<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Nomor </td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 75mm;'>$dataPay[paymentNo]</td>
							<td style=' width: 15mm;' colspan='3'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 120mm;'>Kepada Yth :</td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$paymentDate</td>
							<td></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='3'>$dataPay[customerName]</td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Jenis Pembayaran</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$payType</td>
							<td></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='3'>$dataPay[customerAddress]</td>
						</tr>";
		if ($dataPay['payType'] == '2' || $dataPay['payType'] == '3')
		{
			$content .= "<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>No Rek/Cek/Giro</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataPay[bankNo]</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='4'></td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Nama Bank</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataPay[bankName]</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='4'></td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Nama Akun</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataPay[bankAC]</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='4'></td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal Efektif</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$effectiveDate</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='4'></td>
						</tr>";
		}
					
			$content .= "	
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Ref</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataPay[ref]</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan='4'></td>
						</tr>
					</table>";
		$content .= "<br>
					<table cellpadding='0' cellspacing='0' style='width: 240mm; border-bottom: 1px solid #000;'>
						<tr>
							<th style='width: 150mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO FAKTUR</th>
							<th style='width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: center;'>JUMLAH DIBAYAR</th>
						</tr>
						<tr>
							<td style='width: 150mm; padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataPay[invoiceNo]</td>
							<td style='width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; text-align: center;'>$total</td>
						</tr>
					</table>
					<br />
					<p style='font-size: 12pt;'>Note : <br>$dataPay[note]</p>
					<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 130mm;'></td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 100mm; text-align: center;'>HORMAT KAMI,<br><br><br><br><br>Administrasi</td>
							<td colspan='2'></td>
						</tr>
					</table>";
	}
	
	ob_end_clean();
	// conversion HTML => PDF
	try
	{
		$html2pdf = new HTML2PDF('L', array('240', '240'),'fr', false, 'ISO-8859-15',array(2, 2, 2, 2)); //setting ukuran kertas dan margin pada dokumen anda
		// $html2pdf->setModeDebug();
		$html2pdf->addFont('freesansb', '', 'freesansb.php');// jenis font yg digunakan
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
}
?>