@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Companies</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('companies.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            <h1 class="pull-left">
             <a class="btn btn-primary pull-left" style="margin-top: -10px;margin-bottom: 5px" href="{{url('/printcompanie')}}">Print</a>
         </h1>
                    @include('companies.table')
            </div>
        </div>
    </div>
@endsection

