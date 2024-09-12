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
        <form action="{{ url('/articles/'.$article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" />
            </div>
            <div class="mb-2">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ $article->body }}</textarea>
            </div>
            <div class="mb-2">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ ($category->id == $article->category_id) ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Tag</label>
                <select class="form-control" size="5" multiple name="tag_ids[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag['id'] }}">
                            {{ $tag['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" />
                <img src="{{ Storage::url('articles/'.$article->image) }}" width="100" />
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
