@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New genre</h1>
        <form action="{{ route('genres.store') }}" method="POST">
            @include('genres.form')
        </form>
    </div>
@endsection
