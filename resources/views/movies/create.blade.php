@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add movie</h1>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @include('movies.form')
    </form>
</div>
@endsection
