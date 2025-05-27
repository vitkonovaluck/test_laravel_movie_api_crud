@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Genre list</h1>

        <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Add genre</a>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('genres.edit', $genre) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Видалити жанр?')">Destroy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $genres->links() }}
    </div>
@endsection
