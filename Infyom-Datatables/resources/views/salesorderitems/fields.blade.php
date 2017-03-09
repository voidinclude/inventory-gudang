<!-- Soid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soID', 'Soid:') !!}
    {!! Form::text('soID', null, ['class' => 'form-control']) !!}
</div>

<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productID', 'Productid:') !!}
    {!! Form::text('productID', null, ['class' => 'form-control']) !!}
</div>

<!-- Productname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productName', 'Productname:') !!}
    {!! Form::text('productName', null, ['class' => 'form-control']) !!}
</div>

<!-- Sku Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sku', 'Sku:') !!}
    {!! Form::text('sku', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::text('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Createddate Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salesorderitems.index') !!}" class="btn btn-default">Cancel</a>
</div>
