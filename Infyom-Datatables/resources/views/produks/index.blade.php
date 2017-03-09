@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Produk</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <h1 class="pull-right">
                   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('produks.create') !!}"><i class="fa fa-plus"></i> Produk Baru</a>
                </h1>
                    @include('produks.table')
            </div>
        </div>
    </div>
@endsection

