@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Rogue Artisan on Twitch</h2>

    <div class="row">
        <div class="col-md-8">
            <iframe src="https://player.twitch.tv/?channel=rogueartisan" frameborder="0" scrolling="no" height="420" width="100%"></iframe>
        </div>
        <div class="col-md-4">
            <iframe src="https://www.twitch.tv/rogueartisan/chat?popout=" frameborder="0" scrolling="no" height="420" width="100%"></iframe>
        </div>
    </div>

    <hr />
    
    <div class="row">
        <div class="col-md-4">
        @include('partials.social')
        </div>
        <div class="col-md-6">
            <p>I'd like to thank everyone for the tremendous support I've received through the years. I created this website to make all of my gaming content more easily accessible. I'll post new <a href="{{ route('maps.game.index', ['game' => 'halo-5']) }}">Halo 5 maps</a>, various tutorials, game reviews, articles, and so on.</p>
        </div>
        <div class="col-md-2">
            <h1>#RTSN</h1>
        </div>
    </div>
</div>
<br />
<div class="container-fluid" style="background-color: #f3f3f9">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Halo 5 Maps <small><a href="{{ route('maps.game.index', ['game' => 'halo-5']) }}">see all...</a></small></h2>
                <h4>Featured Maps</h4>
            </div>
        </div>


        <div class="row">
    @if (count($featuredHaloMaps) > 0)
    @foreach ($featuredHaloMaps as $key=>$map)
            <!-- {{ $key }} -->
            @include('maps._mini', ['miniType' => 'image_only', 'columns' => 3])
            <!-- {{ $key }} -->

    @endforeach
    @else
            <div class="col-md-12">
                <p>
                    There are no featured maps.
                </p>
            </div>

    @endif
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <h4>New Maps</h4>
            </div>
        </div>


        <div class="row">
    @if (count($newHaloMaps) > 0)
    @foreach ($newHaloMaps as $key=>$map)
            <!-- {{ $key }} -->
            @include('maps._mini', ['miniType' => 'image_only', 'columns' => 4])
            <!-- {{ $key }} -->

    @endforeach
    @else
            <div class="col-md-12">
                <p>
                    There are no new maps.
                </p>
            </div>

    @endif
        </div>

        <p style="text-align: right;"><a href="{{ route('maps.game.index', ['game' => 'halo-5']) }}">more maps...</a></p>
        <br />
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2>Articles <small><a href="{{ route('articles.index') }}">see all...</a></small></h2>
            @if (count($newArticles) > 0)
            @foreach ($newArticles as $article)

                @include('articles._mini')

            @endforeach
            @else
            <p>There are no new articles.</p>
            @endif
            <p style="text-align: right;"><a href="{{ route('articles.index') }}">more articles...</a></p>
            <br />
        </div>
        <div class="col-md-5">
            <!-- PLACEHOLDER FOR LOBBIES -->
        </div>
    </div>
</div>
@endsection
