@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit genre</h1>
        <form action="{{ route('genres.update', $genre) }}" method="POST">
            @method('PUT')
            @include('genres.form', ['genre' => $genre])
        </form>
    </div>
@endsection
