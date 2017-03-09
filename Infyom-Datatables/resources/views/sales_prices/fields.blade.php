<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerID', 'Customerid:') !!}
    {!! Form::text('customerID', null, ['class' => 'form-control']) !!}
</div>

<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productID', 'Productid:') !!}
    {!! Form::text('productID', null, ['class' => 'form-control']) !!}
</div>

<!-- Productcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productCode', 'Productcode:') !!}
    {!! Form::text('productCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salesPrices.index') !!}" class="btn btn-default">Cancel</a>
</div>
