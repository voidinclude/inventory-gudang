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

            $( "#customerName" ).autocomplete({
                source: "{{ url('ajax-customer') }}",
                minLength: 2,
                select: function( event, ui ) {
                    $("#customerID").val(ui.item.cid);
                    $("#customerName").val(ui.item.cname);
                    $("#customerLabel").val(ui.item.cname);
                    $("#customerAddress").html(ui.item.caddr);
                    create_number_order(ui.item.cid, ui.item.ckode);
                }
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
        });

        function create_number_order(id, code)
        {
            $.ajax( {
                url: "{{ url('ajax-payment') }}",
                dataType: "json",
                data: {
                    custid: id,
                    custcode: code
                },
                success: function( data ) {
                    $("#paymentNo").val(data.faktur);
                    $("#loadInvoice").html(data.invoices);
                    $("#tInvoice").html(Number(data.amountInv).format_angka(0, 3, '.', ','));
                }
            });
        }
    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Faktur Pembayaran Baru
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'salespayments.store', 'name' => 'frmPayment', 'id' => 'frmPayment']) !!}
                    <div class="form-group col-sm-3">
                        {!! Form::label('paymentDate', 'Tanggal Faktur:') !!}
                        {!! Form::text('paymentDate', $tanggal, ['class' => 'form-control input-large']) !!}
                    </div>
                    <div class="form-group col-sm-9">
                        {!! Form::label('paymentNo', 'Nomor Faktur Pembayaran:') !!}
                        {!! Form::text('paymentNo', null, ['class' => 'form-control input-small', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group col-sm-3">
                        {!! Form::label('payType', 'Tipe Pembayaran:') !!}
                        {!! Form::select('payType', ['tunai' => 'Tunai', 'transfer' => 'Transfer', 'cek' => 'Cek', 'giro' => 'Giro'], null, ['class' => 'form-control input-large']) !!}
                    </div>
                    <div class="form-group col-sm-9">
                        {!! Form::label('bankNo', 'No Rekening/ Cek/ Giro:') !!}
                        {!! Form::text('bankNo', null, ['class' => 'form-control input-small']) !!}
                    </div>

                    <div class="form-group col-sm-3">
                        {!! Form::label('bankName', 'Nama Bank:') !!}
                        {!! Form::text('bankName', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('effectiveDate', 'Tanggal Efektif:') !!}
                        {!! Form::text('effectiveDate', null, ['class' => 'form-control input-large']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('bankAC', 'Nama Pemilik Rekening:') !!}
                        {!! Form::text('bankAC', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('customerName', 'Customer:') !!}
                        {!! Form::text('customerName', null, ['class' => 'form-control input-large']) !!}
                        <input type="hidden" name="customerID" id="customerID">
                        <input type="hidden" name="customerLabel" id="customerLabel">
                        <input type="hidden" name="customerAddress" id="customerAddress">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('note', 'Catatan:') !!}
                        <textarea class="form-control" name="note" cols="50" rows="3" id="note"></textarea>
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
                                <tbody id="loadInvoice"></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" style="text-align: right;">Total</th>
                                        <th>RP&nbsp;&nbsp;<span id="tInvoice">0</span></th>
                                        <th></th>
                                        <th>RP&nbsp;&nbsp;<span id="tPaid">0</span>
                                        <input type="hidden" name="totalPaid" id="totalPaid" value="0"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <button class="btn btn-primary" type="submit" id="btnsimpan"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        <a href="{!! route('salespayments.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
