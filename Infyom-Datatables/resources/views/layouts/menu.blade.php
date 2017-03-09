
<!-- Home / Dashboard -->
<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="home">
        <i class="fa fa-home"></i> <span>Beranda</span>
    </a>
</li>
{{ Request::is('UpdateHarga*') }}
<!-- Master Menu -->
@if(Auth::user()->level == '1' or Auth::user()->level == '2')
<li class="treeview
  @if(Request::is('customers*') or Request::is('produks*') or Request::is('salesPrices*') or Request::is('import*'))
        active
  @endif
  ">
    <a href="javascript:;">
        <i class="fa fa-database"></i>
        <span>Data Master</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('customers*') ? 'active' : '' }}">
            <a href="{!! route('customers.index') !!}"><i class="fa fa-angle-double-right"></i><span>Data Customer</span></a>
        </li>

        <li class="{{ Request::is('produks*') ? 'active' : '' }}">
            <a href="{!! route('produks.index') !!}"><i class="fa fa-angle-double-right"></i><span>Data Produk</span></a>
        </li>

        <li class="{{ Request::is('salesPrices*') ? 'active' : '' }}">
            <a href="{!! route('salesPrices.index') !!}"><i class="fa fa-angle-double-right"></i><span>Harga Produk</span></a>
        </li>

        <li class="{{ Request::is('import*') ? 'active' : '' }}">
            <a href="{!! route('import.index') !!}"><i class="fa fa-angle-double-right"></i><span>Harga Produk(Excel)</span></a>
        </li>

    </ul>
</li>
@endif

@if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '3' or Auth::user()->level == '4')
<!-- Transaction Menu -->
<li class="treeview
  @if(Request::is('salesorders*') or Request::is('salesinvoices*') or Request::is('salespayments*'))
        active
  @endif
        ">
    <a href="javascript:;">
        <i class="fa fa-file-text-o"></i>
        <span>Data Transaksi</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        @if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '3')
        <li class="{{ Request::is('salesorders*') ? 'active' : '' }}">
            <a href="{!! route('salesorders.index') !!}"><i class="fa fa-angle-double-right"></i><span>Pemesanan Barang</span></a>
        </li> 
        @endif  

        @if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '3')
        <li class="{{ Request::is('salesinvoices*') ? 'active' : '' }}">
            <a href="{!! route('salesinvoices.index') !!}"><i class="fa fa-angle-double-right"></i><span>Faktur Penjualan</span></a>
        </li>  
        @endif     

        @if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '4')
        <li class="{{ Request::is('salespayments*') ? 'active' : '' }}">
            <a href="{!! route('salespayments.index') !!}"><i class="fa fa-angle-double-right"></i><span>Faktur Pembayaran</span></a>
        </li>
        @endif
    </ul>
</li>
@endif


@if(Auth::user()->level == '1' or Auth::user()->level == '2')
    <!-- Transaction Menu -->
    <li class="treeview
  @if(Request::is('reportsales*') or Request::is('salesinvoices*') or Request::is('reportpayments*'))
            active
      @endif
            ">
        <a href="javascript:;">
            <i class="fa fa-print"></i>
            <span>Laporan Transaksi</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if(Auth::user()->level == '1' or Auth::user()->level == '2')
                <li class="{{ Request::is('reportsales*') ? 'active' : '' }}">
                    <a href="{!! route('reportsales.index') !!}"><i class="fa fa-angle-double-right"></i><span>Pemesanan</span></a>
                </li>
            @endif

            @if(Auth::user()->level == '1' or Auth::user()->level == '2')
                <li class="{{ Request::is('reportinvoices*') ? 'active' : '' }}">
                    <a href="{!! route('reportinvoices.index') !!}"><i class="fa fa-angle-double-right"></i><span>Faktur Penjualan</span></a>
                </li>
            @endif

            @if(Auth::user()->level == '1' or Auth::user()->level == '2')
                <li class="{{ Request::is('reportpayments*') ? 'active' : '' }}">
                    <a href="{!! route('reportpayments.index') !!}"><i class="fa fa-angle-double-right"></i><span>Faktur Pembayaran</span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

