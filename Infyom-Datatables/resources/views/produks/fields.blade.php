<!-- Productcode Field -->
<div class="form-group col-sm-4">
    {!! Form::label('productCode', 'SKU:') !!}
    {!! Form::text('productCode', null, ['class' => 'form-control input-medium']) !!}
</div>
<div class="form-group col-sm-8">&nbsp;</div>

<!-- Productname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('productName', 'Nama Produk:') !!}
    {!! Form::text('productName', null, ['class' => 'form-control input-medium']) !!}
</div>

<!-- Unit Field -->
<div class="form-group col-sm-12">
    {!! Form::label('unit', 'Unit:') !!}
    {!! Form::select('unit', ['1' => 'PCS', '2' => 'SET', '3' => 'LSN'], null, ['class' => 'form-control input-tanggal']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control input-small']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produks.index') !!}" class="btn btn-default">Cancel</a>
</div>
