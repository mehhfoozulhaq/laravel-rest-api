@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('genres.create') }}"><i class="fa fa-plus"></i> Add new Genre</a>
        </div>

        <div class="card mt-2">
            <div class="card-header">Genres ({{ sizeof($genres) }})</div>

            <div class="card-body">
                
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Genre Name</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                            
                        @foreach ($genres as $genre)
                                
                            <tr>
                                <td>{{ $genre->name }}</th>
                                <td>{{ $genre->active == 1 ? 'Active' : 'Inactive' }}</th>
                                <td class="text-center">
                                    <a href="{{ route('genres.view', $genre->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('genres.delete', $genre->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $genres->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
