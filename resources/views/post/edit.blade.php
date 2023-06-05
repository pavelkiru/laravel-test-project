@extends('layouts.main')
@section('content')
    <div>

        <form action="{{ route('post.update', $post->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ $post->name }}" name="name" class="form-control" id="name">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" rows="4" cols="50">
                {{ $post->content }}
                </textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" value="{{ $post->image }}" name="image" class="form-control" id="image">
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" multiple id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                            {{ $tag->id == $postTag->id ? ' selected' : ''}}
                            @endforeach

                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <div class="m-1">
            <a href="{{route('post.index')}}" class="btn btn-primary">Back to list</a>
        </div>
    </div>

@endsection
