@extends('layout.page')

@section('page_name')
    Authors
@endsection
@section('content')
    <a type="button" class="btn btn-primary mb-3" href="{{route('authors.create')}}">Create one</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Has grenade launcher</th>
            <th scope="col">Books count</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$author->name}}</td>
                <td>
                    @if($author->has_rocket_launcher)
                        Definitely yes
                    @else
                        No :(
                    @endif
                </td>
                <td>{{$author->books_count}}</td>
                <td>{{$author->created_at->format('Y-m-d')}}</td>
                <td>
                    <a href="{{route('authors.edit', $author)}}" class="px-1">Edit</a>
                    <form action="{{route('authors.destroy', $author)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link px-1 py-0 align-baseline">Delete</button>
                    </form>
                    <a href="{{route('authors.show', $author)}}" class="px-1">View API data</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
