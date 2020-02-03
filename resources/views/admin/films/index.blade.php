@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('films.create') }}"><i class="fa fa-plus"></i> Add new Film</a>
        </div>

        <div class="card mt-2">
            <div class="card-header">Films ({{ sizeof($films) }})</div>

            <div class="card-body">
                
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Film Name</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Price</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                            
                        @foreach ($films as $film)
                                
                            <tr>
                                <td scope="row">{{ $film->name }}</td>
                                <td>{{ date('d M Y', strtotime($film->release_date)) }}</td>
                                <td>{{ $film->rating }}</td>
                                <td>{{ $film->ticket_price }}</td>
                                <td>{{ sizeof($film->comments) }}</td>
                                <td>
                                    <a href="{{ route('films.comments', $film->id) }}"><i class="fa fa-comments"></i></a>
                                    <a href="{{ route('films.view', $film->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('films.delete', $film->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

                {{ $films->links() }}

            </div>
        </div>
    </div>

</div>
@endsection
