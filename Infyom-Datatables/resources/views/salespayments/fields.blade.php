<!-- Paymentno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paymentNo', 'Paymentno:') !!}
    {!! Form::text('paymentNo', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoiceid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceID', 'Invoiceid:') !!}
    {!! Form::text('invoiceID', null, ['class' => 'form-control']) !!}
</div>

<!-- Paymentdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paymentDate', 'Paymentdate:') !!}
    {!! Form::date('paymentDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Paytype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payType', 'Paytype:') !!}
    {!! Form::text('payType', null, ['class' => 'form-control']) !!}
</div>

<!-- Bankno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bankNo', 'Bankno:') !!}
    {!! Form::text('bankNo', null, ['class' => 'form-control']) !!}
</div>

<!-- Bankname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bankName', 'Bankname:') !!}
    {!! Form::text('bankName', null, ['class' => 'form-control']) !!}
</div>

<!-- Bankac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bankAC', 'Bankac:') !!}
    {!! Form::text('bankAC', null, ['class' => 'form-control']) !!}
</div>

<!-- Effectivedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('effectiveDate', 'Effectivedate:') !!}
    {!! Form::date('effectiveDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerID', 'Customerid:') !!}
    {!! Form::text('customerID', null, ['class' => 'form-control']) !!}
</div>

<!-- Customername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerName', 'Customername:') !!}
    {!! Form::text('customerName', null, ['class' => 'form-control']) !!}
</div>

<!-- Customeraddress Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('customerAddress', 'Customeraddress:') !!}
    {!! Form::textarea('customerAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref', 'Ref:') !!}
    {!! Form::text('ref', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Staffid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('staffID', 'Staffid:') !!}
    {!! Form::text('staffID', null, ['class' => 'form-control']) !!}
</div>

<!-- Staffname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('staffName', 'Staffname:') !!}
    {!! Form::text('staffName', null, ['class' => 'form-control']) !!}
</div>

<!-- Createddate Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salespayments.index') !!}" class="btn btn-default">Cancel</a>
</div>
