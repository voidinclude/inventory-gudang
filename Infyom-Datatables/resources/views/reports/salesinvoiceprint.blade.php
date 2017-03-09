<h1 style="font-family:sans-serif;margin-top:-35px; margin-left: -20px;">MARIA BABY GARMEN</h1>
<h3 style="font-family:sans-serif;margin-top:-35px; margin-left: -20px;">FAKTUR PENJUALAN</h3>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif;font-size: 14px;width: 255mm; margin-right: -20px; margin-left: -20px;'>
    <tr valign='top'>
        <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
        <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO. INVOICE</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TGL INVOICE</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TOTAL</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>POTONGAN</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TOTAL INVOICE</th>
        <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>STATUS</th>
    </tr>
    @foreach($invoice as $salesorders)
        <tr valign='top' style='text-align: center;'>
            <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->invoiceNo}}</td>
            <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->customerName}}</td>
            <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{date("d/m/Y", strtotime($salesorders->invoiceDate))}}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{ number_format($salesorders->total,0,',','.') }}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{ number_format($salesorders->discount,0,',','.') }}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{ number_format($salesorders->grandtotal,0,',','.') }}</td>
            <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->statusText}}</td>
        </tr>
    @endforeach
</table>