{!! Form::open(['route' => ['salesorders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('salesinvoices.create', 'soID=' .$id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Buat Faktur Penjualan">
        <i class="glyphicon glyphicon-file"></i>
    </a>
    <a href="{{ route('salesorders.show', $id) }}" target="_blank" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Cetak Surat Jalan">
        <i class="glyphicon glyphicon-print"></i>
    </a>
    <a href="{{ route('salesorders.edit', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Ubah Pemesanan">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Yakin hapus pesanan ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
