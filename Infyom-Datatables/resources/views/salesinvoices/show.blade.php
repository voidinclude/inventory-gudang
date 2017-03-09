<h1>MARIA BABY GARMEN</h1>
SALES INVOICE
<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
  <tr valign='top'>
  <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
    <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>INVOICE</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>SURAT JALAN</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TGL</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NAMA PRODUK</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>HARGA</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>QTY</th>
    <th style='width: 9mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>SUBTOTAL</th>
</tr>
<tr valign='top' style='text-align: center;'>
    <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
    <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->invoiceNo}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->invoiceDate = date('Y-m-d')}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->invoiceDate = date('Y-m-d')}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->invoiceDate = date('Y-m-d')}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->invoiceDate = date('Y-m-d')}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->payType}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->total}}</td>
    <td style='width: 9mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->grandtotal}}</td>
</tr>
</table>