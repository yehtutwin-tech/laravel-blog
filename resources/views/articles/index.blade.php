@extends('layouts.app')

@section('content')
    <div class="container">
        <x-heading title="Article List">
            <i class="bi-text-paragraph"></i>
        </x-heading>

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
            <x-article.article-item :article="$article" />
        @endforeach

        {{ $articles->links() }}
    </div>
@endsection
