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
                <x-forms.text-input
                    name="title"
                    placeholder="Title..."
                    value="{{ old('title') }}"
                    required="required"
                />
            </div>
            <div class="mb-2">
                <label>Body</label>
                <x-form.textarea />
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
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
