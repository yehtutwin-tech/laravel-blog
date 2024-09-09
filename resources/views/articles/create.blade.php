@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form action="{{ url('/articles/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required />
            </div>
            <div class="mb-2">
                <label>Body</label>
                <textarea name="body" class="form-control" required>{{ old('body') }}</textarea>
            </div>
            <div class="mb-2">
                <label>Category</label>
                <select class="form-control" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" />
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
