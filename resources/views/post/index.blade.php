@extends('layouts.main')
@section('content')
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Tags</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posts as $post)

                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->name }}</td>
                        <td><a href="{{ route('post.show', $post->slug) }}">{{ $post->slug }}</a></td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->image }}</td>
                        <td>@foreach($post->tags as $tag)
                                <span>{{ $tag->title }}</span>
                            @endforeach</td>
                    </tr>

            @endforeach


            </tbody>
        </table>

    </div>
    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary">Create Post</a>
    </div>
@endsection
