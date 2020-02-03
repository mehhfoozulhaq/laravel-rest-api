@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('genres') }}"><i class="fa fa-bars"></i> List All Genres</a>
        </div>

        <div class="card mt-2">
            <div class="card-header">Add Genre</div>

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
                
                {!! Form::model($genre, ['route' => ['genres.update', $genre->id], 'class' => 'needs-validation', 'novalidate']) !!}
                
                @include('admin.genres._form')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</div>
@endsection
