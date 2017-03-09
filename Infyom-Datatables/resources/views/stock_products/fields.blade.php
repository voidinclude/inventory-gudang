<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productID', 'Productid:') !!}
    {!! Form::text('productID', null, ['class' => 'form-control']) !!}
</div>

<!-- Factoryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryID', 'Factoryid:') !!}
    {!! Form::text('factoryID', null, ['class' => 'form-control']) !!}
</div>

<!-- Stockin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stockIN', 'Stockin:') !!}
    {!! Form::text('stockIN', null, ['class' => 'form-control']) !!}
</div>

<!-- Stockout Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stockOut', 'Stockout:') !!}
    {!! Form::text('stockOut', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stockProducts.index') !!}" class="btn btn-default">Cancel</a>
</div>
