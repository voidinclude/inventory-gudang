@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Faktur Penjualan</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            <h1 class="pull-left">
                <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{url('/PrintSalesInvoice')}}"><i class="fa fa-print"></i> Cetak</a>
            </h1>
                @include('salesinvoices.table')
            </div>
        </div>
    </div>
@endsection

