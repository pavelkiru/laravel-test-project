@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('tag.update', $tag->slug) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{ $tag->title }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
