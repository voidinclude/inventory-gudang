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
            $( "#orderDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: 'c-1:c-0'
            });

            $( "#needDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: '2014:c-0'
            });

            $( "#itemName" ).autocomplete({
                source: "{{ url('ajax-product') }}",
                minLength: 2,
                select: function( event, ui ) {
                    $("#itemID").val(ui.item.pid);
                    $("#itemName").val(ui.item.ckode + ' - ' + ui.item.cname);
                    $("#itemSKU").val(ui.item.pkode);
                    $("#itemLabel").val(ui.item.pname);
                    $("#itemUnit").val(ui.item.punit);
                    $("#itemPrice").val(ui.item.pharga);
                    $("#itemPricelabel").val(ui.item.phargainf);
                }
            });

        });

        $(document).ready(function() {
            var row_number = 1;
            var tot_items = Number(0);
            var tot_price = Number(0);

            $(document).on('click', '.pushQty', function()
            {
                var tot_items = 0;
                var tot_price = 0;

                $(".input-qty").each(function(){
                    var qty = $(this).val();
                    var price = $(this).attr('data-price');
                    var rowID = $(this).attr('data-rowid');
                    $("#subrow" + rowID).html(Number(qty*price).format_angka(0, 3, '.', ','));
                    tot_items += Number(qty);
                    tot_price += Number(qty*price);
                });

                $("#tItems").html(tot_items.format_angka(0, 3, '.', ','));
                $("#tPrice").html(tot_price.format_angka(0, 3, '.', ','));
                return false;
            });

            $(document).on('click', '.deleteRow', function()
            {
                var dataRow = $(this).attr('data-id');
                if(confirm('Yakin hapus produk ini?'))
                {
                    $("#tr-" + dataRow).fadeOut(100).remove();

                    var tot_items = 0;
                    var tot_price = 0;
                    $(".input-qty").each(function(){
                        var qty = $(this).val();
                        var price = $(this).attr('data-price');
                        tot_items += Number(qty);
                        tot_price += Number(qty*price);

                    });

                    $("#tItems").html(tot_items.format_angka(0, 3, '.', ','));
                    $("#tPrice").html(tot_price.format_angka(0, 3, '.', ','));
                    return false;
                }
            });

            $(document).on('click', '#pushtoTable', function()
            {
                var itemID = $("#itemID").val();
                var itemSKU = $("#itemSKU").val();
                var itemLabel = $("#itemLabel").val();
                var itemUnit = $("#itemUnit").val();
                var itemPrice = $("#itemPrice").val();
                var itemPricelabel = $("#itemPricelabel").val();

                if(itemID > 0)
                {
                    var tot_items = 0;
                    var tot_price = 0;
                    $("#loaditems").append('<tr id="tr-' + row_number + '">' +
                        '<td>' + itemSKU + '</td>' +
                        '<td>' + itemLabel + '</td>' +
                        '<td style="text-align: right;">Rp. ' + itemPricelabel + '</td>' +
                        '<td>' +
                        '<div class="input-group" style="width: 150px;">' +
                        '<input type="hidden" name="item_id[]" value="' + itemID + '">' +
                        '<input type="hidden" name="item_code[]" value="' + itemSKU + '">' +
                        '<input type="hidden" name="item_name[]" value="' + itemLabel + '">' +
                        '<input type="hidden" name="item_price[]" value="' + itemPrice + '">' +
                        '<input name="item_qty[]" type="text" class="form-control input-medium input-sm input-qty" data-price="' + itemPrice + '" data-rowid="' + row_number + '" id="qty' + row_number + '" value="1">' +
                        '<span class="input-group-btn">' +
                        '<button class="btn btn-default btn-sm pushQty" type="button" data-id="' + row_number + '"><i class="fa fa-pencil"></i> Ubah</button>' +
                        '</span>' +
                        '</div></td>' +
                        '<td>' + itemUnit + '</td>' +
                        '<td style="text-align: right;">RP. <span id="subrow' + row_number + '">' + itemPricelabel + '</span></td>' +
                        '<td><button class="btn btn-danger btn-sm deleteRow" data-id="' + row_number + '"><i class="fa fa-times"></i></button></td>' +
                        '</tr>');

                    $(".input-qty").each(function(){
                        var qty = $(this).val();
                        var price = $(this).attr('data-price');
                        tot_items += Number(qty);
                        tot_price += Number(qty*price);
                    });
                    $("#tPrice").html(tot_price.format_angka(0, 3, '.', ','));
                    $("#tItems").html(tot_items.format_angka(0, 3, '.', ','));

                    $("#itemID").val('');
                    $("#itemName").val('');
                    $("#itemSKU").val('');
                    $("#itemLabel").val('');
                    $("#itemUnit").val('');
                    $("#itemPrice").val('');
                    $("#itemPricelabel").val('');
                    row_number++;
                }else
                {
                    alert('Silahkan pilih produk terlebih dahulu!')
                }
                return false;
            });

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

            $(".input-qty").each(function(){
                var qty = $(this).val();
                var price = $(this).attr('data-price');
                tot_items += Number(qty);
                tot_price += Number(qty*price);
                row_number++;
            });
            $("#tPrice").html(tot_price.format_angka(0, 3, '.', ','));
            $("#tItems").html(tot_items.format_angka(0, 3, '.', ','));
        });

        function create_number_order(id, code)
        {
            $.ajax( {
                url: "{{ url('ajax-sales-order') }}",
                dataType: "json",
                data: {
                    custid: id,
                    custcode: code
                },
                success: function( data ) {
                    $("#soNo").val(data.sono);
                }
            });
        }

    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ubah Pemesanan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesorders, ['route' => ['salesorders.update', $salesorders->id], 'method' => 'patch']) !!}

                        @include('salesorders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection