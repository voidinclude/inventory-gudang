<!-- Factorycode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryCode', 'Factorycode:') !!}
    {!! Form::text('factoryCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Factoryname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryName', 'Factoryname:') !!}
    {!! Form::text('factoryName', null, ['class' => 'form-control']) !!}
</div>

<!-- Factorytype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryType', 'Factorytype:') !!}
    {!! Form::select('factoryType', ['temporary' => 'temporary', 'permanent' => 'permanent'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['0' => 'inactive', '1' => 'active'], null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('factories.index') !!}" class="btn btn-default">Cancel</a>
</div>
