@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size: 80%; font-weight: 800;"><a href="{{ route('home') }}">Artisan Gaming</a>
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; Articles
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Left Controls -->
                <h1>Articles</h1>
            </div>
            <div class="col-md-6">
                <!-- Right Controls -->
                @if ($signedIn)
                    @if ($user->isManager())
                        <a href="{{ route('articles.create') }}" class="btn btn-primary pull-right" role="button">
                            Write a new article
                        </a>
                    @endif
                @endif
            </div>
        </div>


@if (count($articles) > 0)
@foreach ($articles as $article)
        <div class="row">
            <div class="col-md-10">
                <hr />
                <div class="col-md-3">
                    <a href="{{ route('articles.show', ['article' => $article->id, 'slug' => $article->slug]) }}">
                    @if (isSet($article->images[0]))
                        <img src="{{ $article->images[0]->path }}" alt="{{ $article->title }}" class="img-responsive img-rounded">
                    @else
                        <div class="col-md-12" style="text-align: center;">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                    @endif
                    </a>
                </div>
                <div class="col-md-9">
                    <h3><a href="{{ route('articles.show', ['article' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a></h3>
                    <h6><a href="{{ route('users.show', ['user' => $article->author]) }}">Author: {{ $article->author }}</a></h6>
                    <p>
                        {{ $article->brief }}
                    </p>
                </div>
            </div>
        </div>
@endforeach
@else
        <div class="row">
            <div class="col-md-12">
                <p>
                    Sorry, but there aren't any articles available to show.
                </p>
            </div>
        </div>
@endif

    </div>

@endsection


