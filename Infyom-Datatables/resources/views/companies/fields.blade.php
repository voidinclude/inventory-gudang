<!-- Companycode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('companyCode', 'Companycode:') !!}
    {!! Form::text('companyCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('companyName', 'Companyname:') !!}
    {!! Form::text('companyName', null, ['class' => 'form-control']) !!}
</div>

<!-- Contactperson Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contactPerson', 'Contactperson:') !!}
    {!! Form::text('contactPerson', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Village Field -->
<div class="form-group col-sm-6">
    {!! Form::label('village', 'Village:') !!}
    {!! Form::text('village', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', 'District:') !!}
    {!! Form::text('district', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province', 'Province:') !!}
    {!! Form::text('province', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Fax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fax', 'Fax:') !!}
    {!! Form::text('fax', null, ['class' => 'form-control']) !!}
</div>

<!-- Phonecp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phonecp', 'Phonecp:') !!}
    {!! Form::text('phonecp', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Print Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('print_address', 'Print Address:') !!}
    {!! Form::textarea('print_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Faktur Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('faktur_address', 'Faktur Address:') !!}
    {!! Form::textarea('faktur_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('companies.index') !!}" class="btn btn-default">Cancel</a>
</div>
