@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Purchase Price
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($purchasePrice, ['route' => ['purchasePrices.update', $purchasePrice->id], 'method' => 'patch']) !!}

                        @include('purchase_prices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection