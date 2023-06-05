@extends('layouts.main')
@section('content')
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex">
        <div class="m-1">
            <a href="{{route('tag.edit', $tag->slug)}}" class="btn btn-primary">Edit</a>
        </div>
        <div class="m-1">
            <form action="{{route('tag.delete', $tag->slug)}}" method="post">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="m-1">
            <a href="{{route('tag.index')}}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
@endsection
