@extends('layouts.head_ofice')
@section('titel')
{{$salespayments->customerName}} - {{$salespayments->paymentNo}}
@endsection
@section('content')
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-top:-35px; margin-left: -20px; margin-right: -20px; width: 240mm;'>
	<tr valign='top'>
		<td style='width: 150mm;' valign='middle'>
			<div style='font-weight: bold; padding-bottom: 5px; font-size: 20pt;'>
				MARIA BABY GARMEN
			</div>
		</td>
		<td style='width: 83mm;'></td>
	</tr>
	<tr valign='top'>
		<td><span style='font-size: 8pt;'></span>
		</td>
		<td>
			<span style='font-size: 20pt;'><b>BUKTI PEMBAYARAN</b></span>
		</td>
	</tr>
</table>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-top: 10px; margin-left: -20px; margin-right: -20px; width: 240mm;'>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 48mm;'>Nomor</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 50mm;'>{{$salespayments->paymentNo}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 1mm;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Kepada Yth,</td>
	</tr>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->paymentDate = date('Y-m-d')}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->customerName}}</td>
	</tr>
	<tr valign='top'>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Jenis Pembayaran</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{ strtoupper($salespayments->payType) }}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->customerAddress}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
	</tr>
	@if($salespayments->payType != 'tunai')
		<tr>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Bank/ Nama Pemilik</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan="2">{{$salespayments->bankName}} / {{$salespayments->bankAC}}</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan="4"></td>
		</tr>
		<tr>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>No Rek/Cek/Giro</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->bankNo}}</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan="5"></td>
		</tr>
		<tr>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal Efektif</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->effectiveDate = date('Y-m-d')}}</td>
			<td style='padding: 2px 0px 2px 0px; font-size: 12pt;' colspan="5"></td>
		</tr>
	@endif
</table>
<br>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 245mm; '>
	<tr>
		<th style='width: 150mm; padding: 2px 0px 2px 0px; text-align: left; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>&nbsp;&nbsp;&nbsp;NO FAKTUR</th>
		<th style=' text-align: right;width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: right;'>JUMLAH DIBAYAR&nbsp;&nbsp;&nbsp;</th>
	</tr>
	@foreach($paydetail as $detail)
	<tr>
		<td style='width: 150mm; padding: 2px 0px 2px 0px; font-size: 12pt;'>&nbsp;&nbsp;&nbsp;{{ $detail->invoiceNo }}</td>
		<td style='width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; text-align: right;'>Rp. {{number_format($detail->amountPaid,0,',','.')}}&nbsp;&nbsp;&nbsp;</td>
	</tr>
	@endforeach
	<tr>
		<td style='width: 150mm; padding: 2px 0px 2px 0px; font-size: 12pt;text-align: right;border-top: 1px solid #000;'> TOTAL </td>
		<td style='width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; text-align: right;border-top: 1px solid #000;'>Rp. {{number_format($salespayments->total,0,',','.')}}&nbsp;&nbsp;&nbsp;</td>
	</tr>
</table>
<br /><br />
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 240mm;'>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 130mm;' valign="top">
			Note : <br>{{$salespayments->note}}
		</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 100mm; text-align: center;'>HORMAT KAMI,<br><br><br>Administrasi</td>
		<td colspan='2'></td>
	</tr>
</table>
@endsection