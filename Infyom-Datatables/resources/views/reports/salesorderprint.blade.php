<h1 style="font-family:sans-serif;margin-top:-35px; margin-left: -20px;">MARIA BABY GARMEN</h1>
<h3 style="font-family:sans-serif;margin-top:-35px; margin-left: -20px;">FAKTUR PEMESANAN</h3>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif;font-size: 14px;width: 255mm; margin-right: -20px; margin-left: -20px;'>
    <tr valign='top'>
        <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
        <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO. FAKTUR</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TANGGAL PESAN</th>
        <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>STATUS</th>
    </tr>
    @foreach($orders as $salesorders)
        <tr valign='top' style='text-align: center;'>
            <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->soNo}}</td>
            <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->customerName}}</td>
            <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{date("d/m/Y", strtotime($salesorders->orderDate))}}</td>
            <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->statusText}}</td>
        </tr>
    @endforeach
</table>