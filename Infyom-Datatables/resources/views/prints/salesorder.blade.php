<h1>MARIA BABY GARMEN</h1>
SALES ORDER
<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
  <tr valign='top'>
  <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
    <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>PEMESANAN</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TANGGAL PESAN</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TANGGAL DIBUTUHKAN</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>STATUS</th>
</tr>
@foreach($salesorders as $salesorders)
<tr valign='top' style='text-align: center;'>
    <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
    <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->soNo}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->customerName}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->orderDate = date('Y-m-d')}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->needDate = date('Y-m-d')}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->statusText}}</td>
</tr>
@endforeach
</table>