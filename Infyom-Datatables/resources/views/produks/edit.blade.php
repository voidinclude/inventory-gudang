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

@section('content')
    <section class="content-header">
        <h1>
            Ubah Data Produk
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($produk, ['route' => ['produks.update', $id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                    <div class="col-sm-6">
                        <div class="form-group col-sm-12">
                            {!! Form::label('productCode', 'SKU (*) :') !!}
                            {!! Form::text('productCode', null, ['class' => 'form-control input-medium', 'readonly' => 'readonly']) !!}
                        </div>
                        <!-- Productname Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('productName', 'Nama Produk (*) :') !!}
                            {!! Form::text('productName', null, ['class' => 'form-control input-large']) !!}
                        </div>

                        <!-- Unit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('unit', 'Unit:') !!}
                            {!! Form::select('unit', ['1' => 'PCS', '2' => 'SET', '3' => 'LSN'], null, ['class' => 'form-control input-small']) !!}
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control input-small']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        @foreach ($harga as $key=>$value)
                            <div class="form-group col-sm-12">
                                <label for="harga{{ $value['customerID'] }}" class="col-sm-4 control-label">Harga {{ $value['customerName'] }}</label>
                                <div class="col-sm-8">
                                    <input type="text" name="harga[]" id="harga{{ $value['customerID'] }}" value="{{ number_format($value['price'], 0, '','') }}" class="form-control input-medium">
                                    <input type="hidden" name="custid[]" value="{{ $value['customerID'] }}">
                                    <input type="hidden" name="priceid[]" value="{{ $value['priceID'] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('produks.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection