<h1 style="font-family:sans-serif;margin-top:-35px; margin-left: -20px;">MARIA BABY GARMEN</h1>
<h3 style="font-family:sans-serif;margin-top:-35px; margin-left: -20px;">FAKTUR PEMBAYARAN</h3>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif;font-size: 14px;width: 255mm; margin-right: -20px; margin-left: -20px;'>
    <tr valign='top'>
        <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
        <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO. PEMBAYARAN</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TGL PEMBAYARAN</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TOTAL</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TIPE BAYAR</th>
    </tr>
    @foreach($payment as $salesorders)
        <tr valign='top' style='text-align: center;'>
            <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->paymentNo}}</td>
            <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->customerName}}</td>
            <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{date("d/m/Y", strtotime($salesorders->paymentDate))}}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{ number_format($salesorders->total,0,',','.') }}</td>
            <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{ strtoupper($salesorders->payType) }}</td>
        </tr>
    @endforeach
</table>