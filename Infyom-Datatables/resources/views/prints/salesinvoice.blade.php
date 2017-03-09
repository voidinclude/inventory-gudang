<h1>MARIA BABY GARMEN</h1>
SALES INVOICES
<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
  <tr valign='top'>
  <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
    <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO INVOICE</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TGL SO</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TOTAL FAKTUR</th>
    <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>DIBAYAR</th>
    <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>STATUS</th>
</tr>
@foreach($salesinvoices as $salesinvoices)
<tr valign='top' style='text-align: center;'>
    <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
    <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->invoiceNo}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->orderDate = date('Y-m-d')}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->customerName}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->total}}</td>
    <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->amountPaid}}</td>
    <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesinvoices->statusText}}</td>
</tr>
@endforeach
</table>