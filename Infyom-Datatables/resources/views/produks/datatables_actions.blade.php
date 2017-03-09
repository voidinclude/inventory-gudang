{!! Form::open(['route' => ['produks.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('produks.edit', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Ubah Data Produk">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Yakin Hapus Produk ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
