<div class="col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('status', 'Status:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::select('status',['active' => 'Aktif', 'inactive' => 'Tidak Aktif'], null, ['class' => 'form-control input-medium']) !!}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('customerCode', 'Kode Customer (*) :',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('customerCode', null, ['class' => 'form-control input-medium']) !!}
        </div>
    </div>

    <!-- Customername Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('customerName', 'Nama Customer (*) :',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('customerName', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('address', 'Alamat (*) :',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Village Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('village', 'Kelurahan:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('village', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- District Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('district', 'Kecamatan:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('district', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- City Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('city', 'Kota:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Province Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('province', 'Propinsi:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('province', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Zipcode Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('zipCode', 'Kodepos:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('zipCode', null, ['class' => 'form-control input-small']) !!}
        </div>
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('phone', 'Telp:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('phone', null, ['class' => 'form-control input-medium']) !!}
        </div>
    </div>

    <!-- Fax Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('fax', 'Fax:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('fax', null, ['class' => 'form-control input-medium']) !!}
        </div>
    </div>

    <div class="form-group col-sm-12">
        <small>(*) Wajib Di isi </small>
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('contactPerson', 'Kontak (*) :',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('contactPerson', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <!-- Phonecp1 Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('phonecp1', 'HP (*) :',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('phonecp1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Phonecp2 Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('phonecp2', 'HP 2 :',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('phonecp2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('email', 'Email:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Npwp Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('npwp', 'Npwp:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('npwp', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Note Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('note', 'Note:',['class' => 'col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('S I M P A N', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customers.index') !!}" class="btn btn-default">B A T A L</a>
</div>
