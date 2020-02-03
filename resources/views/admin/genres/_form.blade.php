<div class="form-group row">
    {!! Form::label('name', 'Genre Name', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('active', 'Active', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::select('active', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="text-center">
    {!! Form::submit('Save Genre', ['class' => 'btn btn-primary']) !!}
</div>