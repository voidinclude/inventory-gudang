<?php
include "header.php";

// if session is null, showing up the text and exit
if ($_SESSION['staffID'] == '' && $_SESSION['email'] == '')
{
	// show up the text and exit
	header("Location: logout.php");
	exit();
}

else{
	
	ob_start();
	require ("includes/html2pdf/html2pdf.class.php");
	
	$act = $_GET['act'];
	$module = $_GET['module'];
	
	if ($module == 'do' && $act == 'print')
	{
		$doID = $_GET['doID'];
		$doNo = $_GET['doNo'];
		$doFaktur = $_GET['doFaktur'];
		$now = date('Y-m-d');
		
		$filename="unit_delivery_order.pdf";
		$content = ob_get_clean();
		
		// showing up the main do data
		$queryMain = "SELECT * FROM as_delivery_order WHERE doID = '$doID' AND doFaktur = '$doFaktur'";
		$sqlMain = mysqli_query($connect, $queryMain);
		$dataMain = mysqli_fetch_array($sqlMain);
		
		$orderDate = tgl_indo2($dataMain['orderDate']);
		$needDate = tgl_indo2($dataMain['needDate']);
		$deliveredDate = tgl_indo2($dataMain['deliveredDate']);
		
		$content = "<table style='padding-bottom: 10px; width: 240mm;'>
						<tr valign='top'>
							<td style='width: 150mm;' valign='middle'>
								<div style='font-weight: bold;padding-bottom: 5px; font-size: 20pt;'>
									" . $compName . "
								</div>
							</td>
							<td style='width: 83mm;'></td>
						</tr>
						<tr valign='top'>
							<td><span style='font-size: 8pt;'>$compAddrFaktur</span>
							</td>
							<td>
								<span style='font-size: 20pt;'><b>SURAT JALAN</b></span>
							</td>
						</tr>
					</table>
					<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Nomor</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 119mm;'>$dataMain[doNo]</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 80mm;'>Kepada Yth,</td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$deliveredDate</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataMain[customerName]</td>
						</tr>
						<tr>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Sales</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>-</td>
							<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>$dataMain[customerAddress]</td>
						</tr>
					</table><br><br>
					<table cellpadding='0' cellspacing='0' style='width: 240mm; border-bottom: 1px solid #000;'>
						<tr>
							<th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO.</th>
							<th style='width: 25mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>SKU</th>
							<th style='width: 130mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NAMA PRODUK</th>
							<th style='width: 15mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>JML</th>
							<th style='width: 60mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NOTE</th>
						</tr>";
						
						// showing the delivery order detail
						$queryDoDetail = "SELECT * FROM as_detail_do WHERE doFaktur = '$doFaktur' AND doNo = '$doNo' ORDER BY doID ASC";
						$sqlDoDetail = mysqli_query($connect, $queryDoDetail);
						
						// fetch data
						$i = 1;
						while ($dtDoDetail = mysqli_fetch_array($sqlDoDetail))
						{
							$note = (strlen($dtDoDetail['note']) > 13 ? chunk_split($dtDoDetail['note'], 15, "<br>") : $dtDoDetail['note']);
							$productName = (strlen($dtDoDetail['productName']) > 60 ? chunk_split($dtDoDetail['productName'], 65, "<br>") : $dtDoDetail['productName']);
							$qty = rupiah($dtDoDetail[deliveredQty]);
							
							$content .= "
									<tr valign='top'>
										<td style='padding: 2px 0px 2px 0px; font-size: 13pt;'>$i</td>
										<td style='padding: 2px 30px 2px 0px; font-size: 13pt;'>$dtDoDetail[sku]</td>
										<td style='padding: 2px 0px 2px 0px; font-size: 13pt;'>$productName</td>
										<td style='padding: 2px 0px 2px 0px; font-size: 13pt;text-align: center;'>$qty</td>
										<td style='padding: 2px 30px 2px 0px; font-size: 13pt;'>$note</td>
									</tr>
							";
							
							$i++;
						}
			$content .= 
						"
						
					</table>
					<br />
					<table cellpadding='0' cellspacing='0' style='width: 230mm;'>
						<tr>
							<td style='width: 150mm;'>
								<p style='padding: 5px 0px 5px 0px; font-size: 8pt;'></p></td>
							<td></td>
						</tr>
						<tr>
							<td style='padding: 5px 0px 5px 150px; text-align: center; font-size: 14pt; width: 50mm;'><br>PENERIMA,</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 14pt; text-align: center; width: 50mm;'><br>HORMAT KAMI,</td>
						</tr>
						<tr>
							<td style='font-size: 14pt; padding-left: 150px; text-align: center;text-decoration: underline;'><br /><br /><br /><br />
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 11pt; text-align: center; width: 30mm; text-decoration: underline;'><br /><br /><br /><br />&nbsp;Administrasi&nbsp;
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
		// $html2pdf->setModeDebug();
		$html2pdf->addFont('freesansb', '', 'freesansb.php');// jenis font yg digunakan
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
}
?>