@extends('layouts.app')

@section('content')
        


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span style="font-size: 80%; font-weight: 800;"><a href="{{ route('home') }}">Artisan Gaming</a>
             &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; <a href="{{ route('articles.index') }}">Articles</a>
             &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; {{ $article->title }}
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">    
            <h1>{{ $article->title }}
            @if ($signedIn)
                @if ($user->isManager())
                    <span class="small"><a href="{{ route('articles.edit', ['article' => $article->id]) }}">
                        edit article
                    </a></span>
                @endif
            @endif
            </h1>
            
            @include('users._mini', ['profile' => $article->author])

            <div class="row">
                <div class="col-md-12">
                    {{ $article->created_at_human() }}
                    @if ($article->created_at_human() != $article->updated_at_human())
                    (updated: {{ $article->updated_at_human() }})
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            @if (isSet($article->images[0]))
            <img src="{{ $article->images[0]->path }}" alt="{{ $article->title }}" class="img-responsive img-rounded">
            @endif
            <hr />
            <p>
            	{{ $article->body }}
            </p>
        </div>
        <div class="col-md-3">
            <p>
                {{ $article->brief }}
            </p>
        </div>
    </div>
</div>
@endsection
