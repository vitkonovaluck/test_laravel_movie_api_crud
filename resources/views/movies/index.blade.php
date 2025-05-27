@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Movie List</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Add movie</a>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Genre</th>
                <th>Poster</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->is_published ? 'Published' : 'Not published'}}</td>
                    <td>
                        @foreach($movie->genres as $genre)
                            <span class="badge bg-info">{{ $genre->name }}</span>
                        @endforeach
                    </td>
                    <td><img src="{{ asset('storage/' . $movie->poster_path) }}" width="80"></td>
                    <td>
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-warning">Edit</a>
                        @if(!$movie->is_published)
                            <form action="{{ url("movies/{$movie->id}/publish") }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button class="btn btn-sm btn-success">Published</button>
                            </form>
                        @endif
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Destroy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
