@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Factories
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($factories, ['route' => ['factories.update', $factories->id], 'method' => 'patch']) !!}

                        @include('factories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection