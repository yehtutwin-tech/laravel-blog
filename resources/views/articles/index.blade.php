@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <a href="{{ url('/articles/create') }}" class="btn btn-primary mb-2">
                + Create New
            </a>
        @endauth

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ Storage::url('articles/'.$article->image) }}" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-9">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $article->title }}
                                @auth
                                <a href="{{ url('/articles/'.$article->id.'/edit') }}" class="btn btn-warning float-end me-2">Edit</a>
                                @endauth
                            </h5>
                            <div class="card-subtitle mb-2 text-muted small">
                                {{ $article->created_at->diffForHumans() }}
                            </div>
                            <p class="card-text">
                                {{ $article->body }}
                            </p>
                            <a href="{{ url('/articles/' . $article->id) }}" class="card-link">
                                More... &raquo;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $articles->links() }}
    </div>
@endsection
