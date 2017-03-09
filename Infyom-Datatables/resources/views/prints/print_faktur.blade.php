@extends('layouts.head_ofice')
@section('titel')
{{$salesinvoices->invoiceNo}}
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
			<span style='font-size: 20pt;'><b>FAKTUR PENJUALAN</b></span>
		</td>
	</tr>
</table>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-top: 10px; margin-left: -20px; margin-right: -20px; width: 180mm;'>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Nomor Faktur</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 20mm;'>{{$salesinvoices->invoiceNo}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 5mm;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Surat Jalan</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 35mm;'>{{$SO->soNo}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 15mm;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Kepada Yth,</td>
	</tr>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesinvoices->invoiceDate}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesinvoices->customerName}}</td>
	</tr>
	<tr valign='top'>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tipe Bayar</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesinvoices->paymentType}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesinvoices->customerAddress}}</td>
	</tr>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Jatuh Tempo</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesinvoices->expiredDate}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
	</tr>
</table>
<br /><br />
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 250mm; border-bottom: 1px solid #000;'>
	<tr>
		<th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: left;'>NO.</th>
		<th style='width: 25mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: left;'>SKU</th>
		<th style='width: 115mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000;text-align: left;'>NAMA PRODUK</th>
		<th style='width: 35mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: right;'>HARGA</th>
		<th style='width: 30mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: right;'>QTY</th>
		<th style='width: 50mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: right;'>SUBTOTAL</th>
	</tr>
	@foreach($items as $items)
	<tr valign='top'>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;text-align: left;'>{{$no++}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;text-align: left;'>{{$items->sku}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;text-align: left;'>{{$items->productName}}</td>
		<td style='padding: 2px 30px 2px 0px; font-size: 12pt; text-align: right;'>{{number_format($items->price,0,',','.')}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; text-align: right;'>{{$items->qty}} {{$items->unitText}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; text-align: right;'>
			{{ number_format($items->qty * $items->price,0,',','.') }}
		</td>
	</tr>
	@endforeach
</table>
<br />
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 250mm;'>
	<tr valign='top'>
		<td style='padding: 5px 0px 5px 0px; font-size: 12pt; vertical-align: top; text-align: center; width: 150mm; text-decoration: underline;'>
			<br>HORMAT KAMI,<br /><br /><br /><br />Administrasi
		</td>
		<td style='padding: 5px 0px 5px 0px; font-size: 12pt; text-align: right; '>
			<table style="text-align: right;width: 110mm;">
				<tr>
					<td style='width: 43mm; text-align: right;'>Jumlah Harga Jual</td>
					<td style='width: 5mm;'>: Rp.</td>
					<td style='text-align: right; width: 25mm;'>{{number_format($salesinvoices->total,0,',','.')}}</td>
				</tr>
				<tr>
					<td style='text-align: right;'>Potongan</td>
					<td>: Rp.</td>
					<td style='text-align: right;'>{{number_format($salesinvoices->discount,0,',','.')}}</td>
				</tr>
				<tr>
					<td style='text-align: right;'>Total</td>
					<td>: Rp.</td>
					<td style='text-align: right;'><b>{{number_format($salesinvoices->grandtotal,0,',','.')}}</b></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
@endsection