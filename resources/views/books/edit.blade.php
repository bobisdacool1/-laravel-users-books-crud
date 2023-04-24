@extends('layout.page')

@section('page_name')
    Edit book
@endsection
@section('content')
    @include('layout.errors')
    <form action="{{route('books.update', $book)}}" method="POST">
        @method('PATCH')
        @include('books.form-fields')
    </form>
@endsection
