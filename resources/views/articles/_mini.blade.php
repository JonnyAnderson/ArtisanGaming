
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('articles.show', ['article' => $article->id, 'slug' => $article->slug]) }}"><img src="{{ $article->images[0]->path }}" class="img-responsive img-rounded" alt="{{ $article->title }}" title="{{ $article->title }}"></a>
                </div>
                <div class="col-md-8">
                    <h4><a href="{{ route('articles.show', ['article' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a></h4>
                    <p>{{ $article->brief }}</p>
                </div>
            </div>
            <br />