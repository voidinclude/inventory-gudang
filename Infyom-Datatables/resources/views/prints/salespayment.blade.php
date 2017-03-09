<h1>MARIA BABY GARMEN</h1>
BUKTI PEMBAYARAN
<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
  <tr valign='top'>
  <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
    <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO PEMBAYARAN</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TGL PEMBAYARAN</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>JENIS</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TOTAL</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
</tr>
@foreach($salespayments as $salespayments)
<tr valign='top' style='text-align: center;'>
    <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
    <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salespayments->paymentNo}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salespayments->orderDate = date('Y-m-d')}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salespayments->payType}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salespayments->invoiceDate = date('Y-m-d')}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salespayments->customerName}}</td>
</tr>
@endforeach
</table>