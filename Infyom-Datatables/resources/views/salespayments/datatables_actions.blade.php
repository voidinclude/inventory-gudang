{!! Form::open(['route' => ['salespayments.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('salespayments.show', $id) }}" target="_blank" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Cetak Faktur Pembayaran">
        <i class="glyphicon glyphicon-print"></i>
    </a>
    <a href="{{ route('salespayments.edit', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Ubah Faktur Pembayaran">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Yakin hapus pembayaran ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
