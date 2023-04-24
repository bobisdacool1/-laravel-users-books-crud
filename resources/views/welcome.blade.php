@extends('layout.page')

@section('page_name')
    Welcome!
@endsection
@section('content')
    <div class="list-group text-center">
        <a href="{{route('books.index')}}" class="list-group-item list-group-item-action">
            Books
        </a>
        <a href="{{route('authors.index')}}" class="list-group-item list-group-item-action">
            Authors
        </a>
    </div>
@endsection
