@extends('layouts.main')
@section('content')
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Tags</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->name }}</td>
                <td>{{ $post->content }}</td>
                <td><img src="{{ asset("images/thumbnail/$post->image") }}"/></td>
                <td>@foreach($post->tags as $tag)
                        <span>{{ $tag->title }}</span>
                    @endforeach</td>


            </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex">
        <div class="m-1">
            <a href="{{route('post.edit', $post->slug)}}" class="btn btn-primary">Edit</a>
        </div>
        <div class="m-1">
            <form action="{{route('post.delete', $post->slug)}}" method="post">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="m-1">
            <a href="{{route('post.index')}}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
@endsection
