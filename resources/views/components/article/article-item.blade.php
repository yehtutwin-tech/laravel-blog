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
                    (Tags: {{ $article->tags->pluck('name')->implode(', ') }})
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
