@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size: 80%; font-weight: 800;"><a href="{{ route('home') }}">Artisan Gaming</a>
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; <a href="{{ route('maps.index') }}">Maps</a>
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; <a href="{{ route('maps.game.index', ['game' => $map->game->slug]) }}">{{ $map->game->title }} Maps</a>
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; {{ $map->title }}
                </span>
            </div>
        </div>

    <div class="row">
        <h1>{{ $map->title }}
        @if ($signedIn)
            @if ($user->isManager())
                <span class="small"><a href="{{ route('maps.edit', ['map' => $map->id]) }}">
                    edit map
                </a></span>
            @endif
        @endif
        </h1>
    </div>

    <div class="col-md-12">
        {{ $map->brief }}
    </div>

    <br />
    <hr />
    <br />

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div id="mapPreviewImageCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($map->images as $indicatorKey=>$image)
                        <li data-target="#mapPreviewImageCarousel" data-slide-to="{{ $indicatorKey }}"
                        @if($indicatorKey == 0)
                        class="active"
                        @endif
                        ></li>
                        @endforeach
                    </ol>
                
                    <div class="carousel-inner" role="listbox">
                    @foreach ($map->images as $imageKey=>$image)
                    @if($imageKey == 0)
                        <div class="item active">
                    @else
                        <div class="item">
                    @endif
                            <img src="{{ $image->path }}" alt="{{ $map->title }}">
                        </div>
                    @endforeach
                    </div>

                    <a class="left carousel-control" href="#mapPreviewImageCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#mapPreviewImageCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="row">
            <div class="col-md-12">
            {{ $map->description }}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="list-group">
            <a href="{{ $map->download_url }}" class="list-group-item">Download {{ $map->title }} <span class="badge"><i class="fa fa-download" aria-hidden="true"></i></span></a>
            <a href="https://twitter.com/intent/tweet?button_hashtag=RTSN Check out {{ $map->title }} by @ArtisanGaming... {{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}" class="list-group-item" data-show-count="false">Tweet about {{ $map->title }} <span class="badge"><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
            <a href="//www.reddit.com/submit" onclick="window.location = '//www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false" class="list-group-item">Submit to Reddit <span class="badge"><i class="fa fa-reddit" aria-hidden="true"></i></span></a>
        </div>
    </div>

</div>
@endsection
