@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Salesorderitem
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesorderitem, ['route' => ['salesorderitems.update', $salesorderitem->id], 'method' => 'patch']) !!}

                        @include('salesorderitems.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection