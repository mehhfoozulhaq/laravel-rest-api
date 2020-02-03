@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('films') }}"><i class="fa fa-bars"></i> List All Films</a>
        </div>

        <div class="card mt-2">
            <div class="card-header">{{ $film->name }}'s comment ({{ sizeof($film->comments) }})</div>

            <div class="card-body">
                
                @foreach ($film->comments as $comment)
                    <div class="shadow-none p-3 mb-2 bg-light rounded">
                        <div class="row">
                            <div class="col-6"><strong>{{ $comment->name }}</strong></div>
                            <div class="col-6"><i>Date: {{ $comment->created_at }}</i></div>
                            <div class="col">
                                <strong>{{ $comment->comment }}</strong>
                            </div>
                        </div>
                        
                        
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
@endsection
