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
            var filltype = $("#filltype option:selected").val();
            $.ajax( {
                url: "{{ url('sales-payment-paging') }}",
                data: {
                    filno: filno,
                    fildate: fildate,
                    filcust: filcust,
                    filtotal: filtotal,
                    filltype: filltype
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
            var filltype = $("#filltype option:selected").val();
            $.ajax( {
                url: url,
                data: {
                    filno: filno,
                    fildate: fildate,
                    filcust: filcust,
                    filtotal: filtotal,
                    filltype: filltype
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
            var filltype = $("#filltype option:selected").val();
            var win = window.open("{{ url('sales-payment-report') }}?filno=" + filno + "&fildate=" + fildate + "&filcust=" + filcust + "&filtotal=" + filtotal+ "&filltype=" + filltype, '_blank');
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
                url: "{{ url('sales-payment-paging') }}",
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
        <h1 class="pull-left">Laporan Pembayaran</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Nomor Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Customer</th>
                        <th>Janis Pembayaran</th>
                        <th>Total Bayar </th>
                    </tr>
                    <tr>
                        <th><input type="text" name="filno" id="filno" class="form-control" placeholder="Fil Nomor Faktur"></th>
                        <th><input type="text" name="fildate" id="fildate" class="form-control" placeholder="dd-mm-YYYY" ></th>
                        <th><input type="text" name="filcust" id="filcust" class="form-control" placeholder="Customer"></th>
                        <th>
                            <select name="filltype" id="filltype" class="form-control">
                                <option value="all" selected="selected">-- Lihat Semua --</option>
                                <option value="tunai">Tunai</option>
                                <option value="transfer">Transfer</option>
                                <option value="cek">Cek</option>
                                <option value="giro">Giro</option>
                            </select>
                        </th>
                        <th>
                            <div class="input-group">
                                <input type="text" name="filtotal" id="filtotal" class="form-control" placeholder="Total ">
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

