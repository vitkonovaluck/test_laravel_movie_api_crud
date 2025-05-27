@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit movie</h1>
        <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('movies.form', ['movie' => $movie])
        </form>
    </div>
@endsection
