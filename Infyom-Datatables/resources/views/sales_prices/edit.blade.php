@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ubah Harga {{ $customer->customerName }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <div class="col-sm-12">
                   {!! Form::model($customer, ['class'=> 'form-horizontal', 'route' => ['salesPrices.update', $customer->id], 'method' => 'patch']) !!}
                   <table  class="table table-hover" style="width: 50%";>
                       <thead><tr><th >S K U</th><th style="width: 50%">Nama Produk</th><th >Harga</th></tr></thead>
                       <tbody>
                       @foreach($newArray  as $key=>$value)
                           <tr>
                               <td >{{ $value['sku'] }}</td>
                               <td >{{ $value['nama'] }}</td>
                               <td >
                                   <input type="text" name="harga[]" value="{{ $value['price'] }}" />
                                   <input type="hidden" name="produkid[]" value="{{ $value['produkid'] }}" />
                                   <input type="hidden" name="produkcode[]" value="{{ $value['sku'] }}" />
                                   <input type="hidden" name="hargaid[]" value="{{ $value['priceid'] }}" /></td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   <input type="hidden" name="customerid" value="{{ $customer->id }}" />
                   </div>
                   <!-- Submit Field -->
                   <div class="form-group col-sm-10 col-offset-sm-1">
                       {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('salesPrices.index') !!}" class="btn btn-default">Cancel</a>
                   </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection