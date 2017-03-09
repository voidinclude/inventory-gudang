<h1>MARIA BABY GARMEN</h1>
SALES ORDERS
<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
    <thead>
      <tr valign='top'>
          <th style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
          <th style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO SO</th>
          <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>TGL SO</th>
          <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>CUSTOMER</th>
          <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO</th>
          <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NAMA PRODUK</th>
          <th style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>HARGA</th>
          <th style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>QTY</th>
          <th style='width: 9mm; padding: 2px 0px 2px 0px; font-size: 10pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>SUBTOTAL</th>
      </tr>
  </thead>
  <tbody>
      @foreach($items as $key => $items)
      <tr valign='top' style='text-align: center;'>
          @if($key <= 0)
          <td style='width: 2mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$no++}}</td>
          <td style='width: 7mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->soNo}}</td>
          <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->orderDate = date('Y-m-d')}}</td>
          <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$salesorders->customerName}}</td>
          @else
          <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;' colspan="4"></td>
          @endif
          <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$nopro++}}</td>
          <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$items->productName}}</td>
          <td style='width: 10mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$items->price}}</td>
          <td style='width: 13mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$items->qty}}</td>
          <td style='width: 9mm; padding: 2px 0px 2px 0px; font-size: 10pt;'>{{$items->qty}}</td> 
      </tr>
      @endforeach
  </tbody>
</table>