@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stock Products
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stockProducts, ['route' => ['stockProducts.update', $stockProducts->id], 'method' => 'patch']) !!}

                        @include('stock_products.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection