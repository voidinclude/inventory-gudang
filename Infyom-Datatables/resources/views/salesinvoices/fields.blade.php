<!-- Invoiceno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceNo', 'Invoiceno:') !!}
    {!! Form::text('invoiceNo', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoicedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceDate', 'Invoicedate:') !!}
    {!! Form::date('invoiceDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Soid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soID', 'Soid:') !!}
    {!! Form::text('soID', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Paymenttype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paymentType', 'Paymenttype:') !!}
    {!! Form::select('paymentType', ['tunai' => 'TUNAI', 'term' => 'TERM'], null, ['class' => 'form-control']) !!}
</div>

<!-- Expireddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiredDate', 'Expireddate:') !!}
    {!! Form::date('expiredDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Ppn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ppn', 'Ppn:') !!}
    {!! Form::number('ppn', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Grandtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grandtotal', 'Grandtotal:') !!}
    {!! Form::number('grandtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerID', 'Customerid:') !!}
    {!! Form::number('customerID', null, ['class' => 'form-control']) !!}
</div>

<!-- Customername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerName', 'Customername:') !!}
    {!! Form::text('customerName', null, ['class' => 'form-control']) !!}
</div>

<!-- Customeraddress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerAddress', 'Customeraddress:') !!}
    {!! Form::text('customerAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Staffid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('staffID', 'Staffid:') !!}
    {!! Form::number('staffID', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salesinvoices.index') !!}" class="btn btn-default">Cancel</a>
</div>
