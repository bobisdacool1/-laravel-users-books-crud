@extends('layout.page')

@section('page_name')
    Edit author
@endsection
@section('content')
    @include('layout.errors')
    <form action="{{route('authors.update', $author)}}" method="POST">
        @method('PATCH')
        @include('authors.form-fields')
    </form>
@endsection
