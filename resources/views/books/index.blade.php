@extends('layout.page')
@section('page_name')
    Books
@endsection
@section('content')
    <div class="row">
        <div class="col-6">
            <a type="button" class="btn btn-primary mb-3" href="{{route('books.create')}}">Create one</a>
        </div>
        <div class="col-6">
            <form>
                <div class="mb-3 d-flex justify-content-end">
                    <input type="text" name="author" class="form-control col-4 w-50"
                           placeholder="Look for some author..."
                           value="{{Request::input('author') ?? ''}}"/>
                    <button type="submit" class="btn btn-primary mx-3">Submit</button>
                </div>
            </form>
        </div>

    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Copies sold</th>
            <th scope="col">Author</th>
            <th scope="col">Published at</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->copies_sold}}</td>
                <td>{{$book->authors->implode('name', ', ')}}</td>
                <td>{{$book->published_at?->format('Y-m-d')}}</td>
                <td>{{$book->created_at->format('Y-m-d')}}</td>
                <td>
                    <a href="{{route('books.edit', $book)}}" class="px-1">Edit</a>
                    <form action="{{route('books.destroy', $book)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link px-1 py-0 align-baseline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
