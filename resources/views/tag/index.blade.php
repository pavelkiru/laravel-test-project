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

            @foreach($tags as $tag)

                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->title }}</td>
                    <td><a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->slug }}</a></td>
                    </tr>

            @endforeach


            </tbody>
        </table>

    </div>
    <div>
        <a href="{{route('tag.create')}}" class="btn btn-primary">Create Tag</a>
    </div>
@endsection
