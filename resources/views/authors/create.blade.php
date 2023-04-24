@extends('layout.page')

@section('page_name')
    Add author
@endsection
@section('content')
    @include('layout.errors')
    <form action="{{route('authors.store')}}" method="POST">
        @method('POST')
        @include('authors.form-fields')
    </form>
@endsection
