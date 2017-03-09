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
            $( "#paymentDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: 'c-1:c-0'
            });

            $( "#effectiveDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: 'c-1:c-0'
            });
        });

        $(document).ready(function() {
            var row_number = 1;

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

            $(document).on('keyup', '.input_price', function()
            {
                var tot_paid = 0;

                $(".input_price").each(function(){
                    var r_paid = $(this).val();
                    tot_paid += Number(r_paid);
                });
                
                $("#tPaid").html(tot_paid.format_angka(0, 3, '.', ','));
                $("#totalPaid").val(tot_paid);
                return true;
            });

            $(document).on('click', '#btnsimpan', function()
            {
                $("#frmPayment").submit();
            });

            var tPayment = 0;
            $(".input_price").each(function()
            {
                var amt = $(this).val();
                var totalInv = $(this).attr('data-invoice');
                var totalPaid = $(this).attr('data-totalp');
                var dateInv = $(this).attr('data-dateinv');
                var nd = dateInv.split("-");
                tPayment += Number(totalPaid);

                $(this).parent().prev().html(Number(totalInv-totalPaid).format_angka(0, 3, '.', ','));
                $(this).parent().prev().prev().html(Number(totalInv).format_angka(0, 3, '.', ','));
                $(this).parent().prev().prev().prev().html(nd[2] + '-' + nd[1] + '-' + nd[0]);
            });
            $("#totalPaid").html(tPayment);
            $("#tPaid").html(Number(tPayment).format_angka(0, 3, '.', ','));
        });
    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ubah Faktur Pembayaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salespayments, ['route' => ['salespayments.update', $salespayments->id], 'method' => 'patch', 'name' => 'frmPayment', 'id' => 'frmPayment']) !!}
                   <div class="form-group col-sm-3">
                        {!! Form::label('paymentDate', 'Tanggal Faktur:') !!}
                        {!! Form::text('paymentDate', $dataBayar['paymentDate'], ['class' => 'form-control input-large']) !!}
                    </div>
                    <div class="form-group col-sm-9">
                        {!! Form::label('paymentNo', 'Nomor Faktur Pembayaran:') !!}
                        {!! Form::text('paymentNo', $dataBayar['paymentNo'], ['class' => 'form-control input-small', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group col-sm-3">
                        {!! Form::label('payType', 'Tipe Pembayaran:') !!}
                        {!! Form::select('payType', ['tunai' => 'Tunai', 'transfer' => 'Transfer', 'cek' => 'Cek', 'giro' => 'Giro'], $dataBayar['payType'], ['class' => 'form-control input-large']) !!}
                    </div>
                    <div class="form-group col-sm-9">
                        {!! Form::label('bankNo', 'No Rekening/ Cek/ Giro:') !!}
                        {!! Form::text('bankNo', $dataBayar['bankNo'], ['class' => 'form-control input-small']) !!}
                    </div>

                    <div class="form-group col-sm-3">
                        {!! Form::label('bankName', 'Nama Bank:') !!}
                        {!! Form::text('bankName', $dataBayar['bankName'], ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('effectiveDate', 'Tanggal Efektif:') !!}
                        {!! Form::text('effectiveDate', $dataBayar['effectiveDate'], ['class' => 'form-control input-large']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('bankAC', 'Nama Pemilik Rekening:') !!}
                        {!! Form::text('bankAC', $dataBayar['bankAC'], ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('customerName', 'Customer:') !!}
                        {!! Form::text('customerName', $dataBayar['customerName'], ['class' => 'form-control input-large', 'disabled' => 'disabled']) !!}
                        <input type="hidden" name="customerID" id="customerID" readonly="readonly" value="{{ $dataBayar['customerID'] }}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('note', 'Catatan:') !!}
                        <textarea class="form-control" name="note" cols="50" rows="3" id="note">{{ $dataBayar['note'] }}</textarea>
                    </div>

                    <div class="col-sm-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="detailso" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="header">Faktur Penjualan</th>
                                        <th class="header">Tanggal Faktur</th>
                                        <th class="header">Nominal</th>
                                        <th class="header">Terhutang</th>
                                        <th class="header">Dibayar</th>
                                    </tr>
                                </thead>
                                <tbody id="loadInvoice">
                                @if (count($detail) === 0)
                                    <tr><td colspan="5">Detail Pembayaran kosong!</td></tr>
                                @else
                                    @foreach ($detail as $detail)
                                        <tr>
                                            <td class="header">{{ $detail->invoiceNo }}</td>
                                            <td class="header">{{ $detail->invoiceDate }}</td>
                                            <td class="header">{{ $detail->grandtotal }}</td>
                                            <td class="header">{{ $detail->totalPaid }}</td>
                                            <td class="header">
                                                <input type="text" class="form-control input_price" data-invoice="{{ $detail->grandtotal }}" data-totalp="{{ $detail->totalPaid }}" data-dateinv="{{ $detail->invoiceDate }}" name="amountpaid[]" value="{{ $detail->amountPaid }}">
                                                <input type="hidden" name="maountBef[]" value="{{ $detail->amountPaid }}" >
                                                <input type="hidden" name="amountid[]" value="{{ $detail->invoiceID }}" >
                                                <input type="hidden" name="detid[]" value="{{ $detail->id }}" ></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align: right;">Total</th>
                                        <th>RP&nbsp;&nbsp;<span id="tPaid">0</span>
                                        <input type="hidden" name="totalPaid" id="totalPaid" value="{{ $dataBayar['total'] }}"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <button class="btn btn-primary" type="submit" id="btnsimpan"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        <a href="{{ route('salespayments.show', $salespayments->id) }}" target="_blank" class='btn btn-success '>
                            <i class="glyphicon glyphicon-print"></i> Cetak Faktur Pembayaran
                        </a>
                        <a href="{!! route('salespayments.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection