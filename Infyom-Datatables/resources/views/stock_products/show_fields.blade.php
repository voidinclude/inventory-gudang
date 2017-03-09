<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $stockProducts->id !!}</p>
</div>

<!-- Productid Field -->
<div class="form-group">
    {!! Form::label('productID', 'Productid:') !!}
    <p>{!! $stockProducts->productID !!}</p>
</div>

<!-- Factoryid Field -->
<div class="form-group">
    {!! Form::label('factoryID', 'Factoryid:') !!}
    <p>{!! $stockProducts->factoryID !!}</p>
</div>

<!-- Stockin Field -->
<div class="form-group">
    {!! Form::label('stockIN', 'Stockin:') !!}
    <p>{!! $stockProducts->stockIN !!}</p>
</div>

<!-- Stockout Field -->
<div class="form-group">
    {!! Form::label('stockOut', 'Stockout:') !!}
    <p>{!! $stockProducts->stockOut !!}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', 'Note:') !!}
    <p>{!! $stockProducts->note !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $stockProducts->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $stockProducts->updated_at !!}</p>
</div>

