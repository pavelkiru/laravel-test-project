@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('tag.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{ old('title') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
