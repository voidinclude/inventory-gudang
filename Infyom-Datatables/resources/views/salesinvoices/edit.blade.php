@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.css') }}" type="text/css">
    <style>
        .input-tanggal{ width: 15%; }
        .input-small{ width: 25%; }
        .input-medium{ width: 50%; }
        .input-large{ width: 75%; }
        .ui-datepicker{ z-index: 5!important;}
    </style>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>
    <script>
        $( function() {
            $( "#invoiceDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: 'c-1:c-0'
            });

            $( "#expiredDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: 'c-1:c-0'
            });
        });

        $(document).ready(function() {
            /**
             * Number.prototype.format(n, x, s, c)
             *
             * @param integer n: length of decimal
             * @param integer x: length of whole part
             * @param mixed   s: sections delimiter
             * @param mixed   c: decimal delimiter
             */
            Number.prototype.format_angka = function(n, x, s, c) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                    num = this.toFixed(Math.max(0, ~~n));
                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
            };

            $("#tOrder").val(Number($("#total").val()).format_angka(0, 3,'.',','));
            $("#tInvoice").val(Number($("#grandtotal").val()).format_angka(0, 3,'.',','));

            $(document).on('keyup', '#tdiscount', function()
            {
                var hdisc = $(this).val();
                var htotal = $("#total").val();

                $("#grandtotal").val(Number(htotal - hdisc));
                $("#tInvoice").val(Number(htotal - hdisc).format_angka(0, 3,'.',','));
                return true;
            });

            $(document).on('keydown', '#tdiscount', function()
            {
                var hdisc = $(this).val();
                var htotal = $("#total").val();

                $("#grandtotal").val(Number(htotal - hdisc));
                $("#tInvoice").val(Number(htotal - hdisc).format_angka(0, 3,'.',','));
                return true;
            });

            $(document).on('change', '#paymentType', function()
            {
                var value = $(this).val();
                if(value === 'term') $("#loadexpDate").show();
                else  $("#loadexpDate").hide();
            });
        });
    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Faktur Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesinvoices, ['route' => ['salesinvoices.update', $salesinvoices->id], 'method' => 'patch']) !!}
                   <div class="form-group col-sm-2">
                       <label for="invoiceDate">Tanggal Faktur:</label>
                       <input type="text" name="invoiceDate" id="invoiceDate" value="{{ $dataPesan['invoiceDate'] }}" class="form-control input-large" placeholder="dd-mm-YYYY" {{ $disabled }}>
                   </div>
                   <div class="form-group col-sm-3">
                       <label for="soNo">Nomor Faktur:</label>
                       <input type="text" name="invoiceNo" id="invoiceNo" class="form-control input-large" readonly="readonly" value="{{ $dataPesan['invoiceNo'] }}">
                   </div>
                   <div class="form-group col-sm-1"></div>
                   <div class="form-group col-sm-6">
                       <label for="soNo">Referensi dari pemesanan:</label>
                       <input type="text" name="soNo" id="soNo" class="form-control input-medium" readonly="readonly" value="">
                       <input type="hidden" name="soID" value="{{ $dataPesan['soID'] }}">
                   </div>

                   <div class="form-group col-sm-2">
                       <label for="paymentType">Tipe Pembayaran :</label>
                       <select class="form-control input-large" name="paymentType" id="paymentType" {{ $disabled }}>
                           <option {{ ($dataPesan['paymentType'] == 'tunai' ? 'selected="selected"' : '') }} value="tunai">TUNAI</option>
                           <option {{ ($dataPesan['paymentType'] == 'term' ? 'selected="selected"' : '') }} value="term">TERM</option>
                       </select>
                   </div>
                   <div class="form-group col-sm-2">
                       <div id="loadexpDate" @if($dataPesan['paymentType'] === 'tunai') style="display: none;" @endif >
                           <label for="expiredDate">Tanggal Jatuh tempo:</label>
                           <input type="text" name="expiredDate" id="expiredDate" value="{{ $dataPesan['expiredDate'] }}" class="form-control input-large" placeholder="dd-mm-YYYY" {{ $disabled }}>
                       </div>
                   </div>
                   <div class="form-group col-sm-2"></div>
                   <div class="form-group col-sm-6">
                       <label for="soNo">Customer:</label>
                       <input type="text" name="customerName" id="customerName" class="form-control input-large" readonly="readonly" value="{{ $dataPesan['customerName'] }}">
                       <input type="hidden" name="customerID" id="customerID" readonly="readonly" value="{{ $dataPesan['customerID'] }}">
                       <input type="hidden" name="customerAddress" id="customerAddress" readonly="readonly" value="{{ $dataPesan['customerAddress'] }}">
                   </div>

                   <div class="form-group col-sm-12"></div>

                   <div class="col-sm-12 col-lg-12">
                       <div class="table-responsive">
                           <table id="detailso" class="table table-bordered table-striped">
                               <thead>
                               <tr>
                                   <th class="header">SKU</th>
                                   <th class="header">NAMA PRODUK</th>
                                   <th class="header">HARGA</th>
                                   <th class="header">QTY</th>
                                   <th class="header">UNIT</th>
                                   <th class="header">SUBTOTAL</th>
                               </tr>
                               </thead>
                               <tbody id="loaditems">
                               @if($items != null)
                                   @foreach ($items as $items)
                                       <tr id="tr-{{ $loop->iteration }}">
                                           <td>{{ $items->sku }}</td>
                                           <td>{{ $items->productName }}</td>
                                           <td style="text-align: right;">Rp. {{ number_format($items->price,0,',','.') }}</td>
                                           <td>{{ $items->qty }}</td>
                                           <td>
                                               @if ($items->unit === 1)
                                                   SET
                                               @elseif ($items->qty > 1)
                                                   PCS
                                               @else
                                                   LSN
                                               @endif
                                           </td>
                                           <td style="text-align: right;">RP. <span id="subrow{{ $loop->iteration }}">{{ number_format($items->qty * $items->price,0,',','.') }}</span></td>
                                       </tr>
                                   @endforeach
                               @endif
                               </tbody>
                           </table>
                       </div>
                   </div>

                   <div class="form-group col-sm-12">
                       <label class="col-sm-2" for="tOrder">Total:</label>
                       <div class="col-sm-4">
                           <input type="text" id="tOrder" class="form-control input-medium" readonly="readonly" value="{{ $dataPesan['total'] }}" {{ $disabled }}>
                           <input type="hidden" name="total" id="total" value="{{ $dataPesan['total'] }}">
                       </div>
                   </div>

                   <div class="form-group col-sm-12">
                       <label class="col-sm-2" for="tdiscount">Potongan:</label>
                       <div class="col-sm-4">
                           <input type="text" name="discount" id="tdiscount" value="{{ $dataPesan['discount'] }}" class="form-control input-medium" {{ $disabled }}>
                       </div>
                   </div>

                   <div class="form-group col-sm-12">
                       <label class="col-sm-2" for="tInvoice">Total Invoice:</label>
                       <div class="col-sm-4">
                           <input type="text" id="tInvoice" class="form-control input-medium" readonly="readonly" {{ $disabled }}>
                           <input type="hidden" name="grandtotal" id="grandtotal" value="{{ $dataPesan['grandtotal'] }}">
                       </div>
                   </div>
                   <div class="form-group col-sm-12">
                       <button class="btn btn-primary" type="submit" {{ $disabled }}><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                       <a href="{{ route('salesinvoices.show', $salesinvoices->id) }}" target="_blank" class='btn btn-success '>
                           <i class="glyphicon glyphicon-print"></i> Cetak Faktur Penjualan
                       </a>
                       <a href="{!! route('salesinvoices.index') !!}" class="btn btn-default">Batal</a>
                   </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection