@extends('layout.page')

@section('page_name')
    Add book
@endsection
@section('content')
    @include('layout.errors')
    <form action="{{route('books.store')}}" method="POST">
        @method('POST')
        @include('books.form-fields')
    </form>
@endsection
