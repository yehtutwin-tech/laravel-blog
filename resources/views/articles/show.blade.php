@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $article->title }}
                </h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text">
                    {{ $article->body }}
                </p>
                {{-- <a href="{{ url('/articles/delete/' . $article->id) }}" class="btn btn-danger">
                    Delete
                </a> --}}

                @auth
                    <form action="{{ url('/articles/' . $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                @endauth
            </div>
        </div>

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif

        <ul class="list-group mb-2">
            <li class="list-group-item active fw-bold">
                Comments ({{ count($article->comments) }})
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url('/comments/delete/' . $comment->id) }}" class="btn-close float-end"></a>
                    {{ $comment->content }}
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>

        @auth
            <form action="{{ url('/comments/store') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}" />
                <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
                <button type="submit" class="btn btn-secondary">Add Comment</button>
            </form>
        @endauth

        @guest
            <div class="alert alert-secondary">
                Please register/login to add comment
                <a href={{ url('login') }} class="btn btn-link p-0">Login</a>
            </div>
        @endguest
    </div>
@endsection
