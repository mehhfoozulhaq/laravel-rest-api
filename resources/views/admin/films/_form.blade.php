<div class="form-group row">
    {!! Form::label('name', 'Film Name', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('release_date', 'Release Date', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('release_date', null, ['class' => 'form-control datepicker', 'readonly', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('ticket_price', 'Ticket Price', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('ticket_price', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('country', 'Country', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('country', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('rating', 'Rating', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::selectRange('rating', 1, 5, null, ['class' => 'form-control', 'placeholder' => 'Select Rating', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('Genre', 'Genre', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::select('genres[]', $genres, null, ['class' => 'form-control', 'multiple', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::file('image', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>