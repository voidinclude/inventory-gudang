@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.css') }}" type="text/css">
    <style>
        .input-tanggal{ width: 15%; }
        .input-small{ width: 25%; }
        .input-medium{ width: 50%; }
        .input-large{ width: 75%; }
        .ui-datepicker{ z-index: 5!important;}

        .table>thead>tr>th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }
        tr.odd{ background-color: #DDDDDD;}
    </style>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>
    <script>
        $( function() {
            $( "#fildate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: 'c-1:c-0'
            });
        });

        $(document).on('click', '#btnfilter', function(){
            var filno = $("#filno").val();
            var fildate = $("#fildate").val();
            var filcust = $("#filcust").val();
            var filtotal = $("#filtotal").val();
            var fildisc = $("#fildisc").val();
            var filinv = $("#filinv").val();
            var filstat = $("#filstat option:selected").val();
            $.ajax( {
                url: "{{ url('sales-invoice-paging') }}",
                data: {
                    filno: filno,
                    fildate: fildate,
                    filcust: filcust,
                    filtotal: filtotal,
                    fildisc: fildisc,
                    filinv: filinv,
                    filstat: filstat
                },
                success: function( data ) {
                    $("#loadData").html(data);
                }
            });
            return false;
        });
        $(document).on('click', '.pagination a', function()
        {
            var url = $(this).attr('href');
            var spl = url.split('?');
            var filno = $("#filno").val();
            var fildate = $("#fildate").val();
            var filcust = $("#filcust").val();
            var filtotal = $("#filtotal").val();
            var fildisc = $("#fildisc").val();
            var filinv = $("#filinv").val();
            var filstat = $("#filstat option:selected").val();
            $.ajax( {
                url: url,
                data: {
                    filno: filno,
                    fildate: fildate,
                    filcust: filcust,
                    filtotal: filtotal,
                    fildisc: fildisc,
                    filinv: filinv,
                    filstat: filstat
                },
                success: function( data ) {
                    $("#loadData").html(data);
                }
            });
            return false;
        });

        $(document).on('click', '#btncetak', function()
        {
            var filno = $("#filno").val();
            var fildate = $("#fildate").val();
            var filcust = $("#filcust").val();
            var filtotal = $("#filtotal").val();
            var fildisc = $("#fildisc").val();
            var filinv = $("#filinv").val();
            var filstat = $("#filstat option:selected").val();
            var win = window.open("{{ url('sales-invoice-report') }}?filno=" + filno + "&fildate=" + fildate + "&filcust=" + filcust + "&filtotal=" + filtotal+ "&fildisc=" + fildisc+ "&filinv=" + filinv+ "&filstat=" + filstat, '_blank');
            if (win) {
                win.focus();
            } else {
                alert('Silahkan allow popups untuk website ini!');
            }
            return false;
        });

        $(document).ready(function()
        {
            $.ajax( {
                url: "{{ url('sales-invoice-paging') }}",
                success: function( data ) {
                    $("#loadData").html(data);
                }
            });
            return false;
        });
    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Laporan Penjualan</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Nomor Invoice</th>
                        <th>Tanggal Invoice</th>
                        <th>Customer</th>
                        <th>Total </th>
                        <th>Potongan</th>
                        <th>Total Invoice</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <th><input type="text" name="filno" id="filno" class="form-control" placeholder="Fil Nomor Faktur"></th>
                        <th><input type="text" name="fildate" id="fildate" class="form-control" placeholder="dd-mm-YYYY" ></th>
                        <th><input type="text" name="filcust" id="filcust" class="form-control" placeholder="Customer"></th>
                        <th><input type="text" name="filtotal" id="filtotal" class="form-control" placeholder="Total "></th>
                        <th><input type="text" name="fildisc" id="fildisc" class="form-control" placeholder="Potongan"></th>
                        <th><input type="text" name="filinv" id="filinv" class="form-control" placeholder="Total Invoice"></th>
                        <th>
                            <div class="input-group">
                                <select name="filstat" id="filstat" class="form-control">
                                    <option value="0" selected="selected">-- Lihat Semua --</option>
                                    <option value="1">Faktur Baru</option>
                                    <option value="2">Dibayar Sebagian</option>
                                    <option value="3">Lunas</option>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="btnfilter" type="button">Filter</button>
                                </span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="loadData"></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

