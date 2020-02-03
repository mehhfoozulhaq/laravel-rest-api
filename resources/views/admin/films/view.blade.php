@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('films') }}"><i class="fa fa-bars"></i> List All Films</a>
        </div>

        <div class="card mt-2">
            <div class="card-header">Add Films</div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                
                {!! Form::model($film, ['route' => ['films.update', $film->id], 'files' => true, 'class' => 'needs-validation', 'novalidate']) !!}
                    
                    @include('admin.films._form')

                    <div class="text-center">
                        {!! Form::submit('Save Film', ['class' => 'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}

            </div>
        </div>
    </div>

</div>
@endsection
