{!! Form::open(['route' => ['salesinvoices.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('salesinvoices.show', $id) }}" target="_blank" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Cetak Faktur Penjualan">
        <i class="glyphicon glyphicon-print"></i>
    </a>
    <a href="{{ route('salesinvoices.edit', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Ubah Faktur Penjualan">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Yakin hapus faktur penjualan ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
