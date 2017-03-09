@extends('layouts.head_ofice')
@section('titel')
{{$salesorders->soNo}}
@endsection
@section('content')
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-top:-35px; margin-left: -20px; margin-right: -20px; width: 240mm;'>
    <tr valign='top'>
        <td style='width: 150mm;' valign='middle'>
            <div style='font-weight: bold;padding-bottom: 5px; font-size: 20pt;'>
              MARIA BABY GARMEN
          </div>
      </td>
      <td style='width: 83mm;'></td>
  </tr>
  <tr valign='top'>
    <td><span style='font-size: 8pt;'></span>
    </td>
    <td>
        <span style='font-size: 20pt;'><b>SURAT JALAN</b></span>
    </td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 240mm;'>
    <tr>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Nomor</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 119mm;'>{{$salesorders->soNo}}</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 80mm;'>Kepada Yth,</td>
    </tr>
    <tr>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesorders->orderDate = date('Y-m-d')}}</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesorders->customerName}}</td>
    </tr>
    <tr>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Sales</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>-</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salesorders->customerAddress}}</td>
    </tr>
</table><br><br>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;text-align: left; width: 248mm; border-bottom: 1px solid #000;'><thead>
    <tr valign='top'>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;text-align: center;'>NO.</th>
        <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;text-align: left;'>SKU</th>
        <th style='width: 100mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;text-align: left;'>NAMA PRODUK</th>
        <th style='width: 50mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>JML</th>
        <th style='width: 30mm; padding: 2px 0px 2px 0px; font-size: 13pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>UNIT</th>
       
    </tr>
</thead>
<tbody>@foreach($items as $items)
    <tr valign='top'>
        <td style='padding: 2px 0px 2px 0px; font-size: 13pt;text-align: center;'>{{$nopro++}}</td>
        <td style='padding: 2px 30px 2px 0px; font-size: 13pt;text-align: left;'>{{$items->sku}}</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 13pt;'>{{$items->productName}}</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 13pt;text-align: center;'>{{$items->qty}}</td>
        <td style='padding: 2px 0px 2px 0px; font-size: 13pt;text-align: center;'>{{ $items->unitText }}</td>
        
    </tr>@endforeach
</tbody>
</table>
<br />
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif;width: 230mm;'>
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
            <td style='font-size: 11pt;  padding-left: 150px; text-align: center;width: 30mm;'><br /><br /><br /><br />
                ____________
            </td>
            <td style='padding: 5px 0px 5px 0px; font-size: 11pt; text-align: center; width: 30mm; text-decoration: underline;'><br /><br /><br /><br />&nbsp;Administrasi&nbsp;
                </td>
            </tr>
        </table>
        @endsection