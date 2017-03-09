{!! Form::open(['route' => ['salesPrices.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('salesPrices.edit', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="right" title="Ubah Harga">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
{!! Form::close() !!}
