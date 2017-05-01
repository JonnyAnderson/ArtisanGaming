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
            <div class="row">
                <div class="col-md-4">
                    <img src="/files/images/maps/1-element-1473144926-13233442.png" class="img-responsive img-rounded" alt="article">
                </div>
                <div class="col-md-8">
                    <h4><a href="#">Forge is coming to PC</a></h4>
                    <p>Microsoft and 343 Industries announced on Tuesday morning that the popular Halo 5 Forge mode will be making its debut on PC. Also coming to PC is Halo 5's custom games and a new Halo app.</p>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-4">
                    <img src="/files/images/maps/1-element-1473144926-13233442.png" class="img-responsive img-rounded" alt="article">
                </div>
                <div class="col-md-8">
                    <h4><a href="#">Fall Arena Preview Goes Live</a></h4>
                    <p>Next time you login to Halo 5, you'll see a new "Fall Arena Preview" playlist. The new playlist features numerous updates to the official HCS maps and gametypes.</p>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-4">
                    <img src="/files/images/maps/1-element-1473144926-13233442.png" class="img-responsive img-rounded" alt="article">
                </div>
                <div class="col-md-8">
                    <h4><a href="#">Announcing Our First Tournament</a></h4>
                    <p>Artisan Gaming will be hosting its first tournament on September 24. The tournament will be played on RTSN: Octagon and will have a minimum $50 prize pool.</p>
                </div>
            </div>
            <!-- <br />
            <div class="row">
                <div class="col-md-4">
                    <img src="/files/images/maps/1-element-1473144926-13233442.png" class="img-responsive img-rounded" alt="article">
                </div>
                <div class="col-md-8">
                    <h4><a href="#">The Evolution of Halo</a></h4>
                    <p>Many players criticize 343 for the direction Halo has gone in recent years. Some blame the studio for the failures of Halo 4 and MCC. The reality may be very different.</p>
                </div>
            </div> -->
            <p style="text-align: right;"><a href="{{ route('articles.index') }}">more articles...</a></p>
            <br />
        </div>
        <div class="col-md-5">
            <h2>Lobbies <small><a href="{{ url('lobbies') }}">see all...</a></small></h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-success"><b>8:30pm</b> | <i>RTSN: Octagon w/ Artisan</i><span class="badge">+2 waiting</span><span class="badge"><i class="fa fa-star" aria-hidden="true"></i></span></a>
                        <a href="#" class="list-group-item list-group-item-warning"><b>8:45pm</b> | <i>Custom 8's </i><span class="badge">2 spots left</span></a>
                        <a href="#" class="list-group-item list-group-item-warning"><b>8:45pm</b> | <i>RTSN: Aquagon </i><span class="badge">1 spots left</span></a>
                        <a href="#" class="list-group-item"><b>9:00pm</b> | <i>RTSN: Praesidium </i><span class="badge">4 spots left</span></a>
                        <a href="#" class="list-group-item"><b>9:15pm</b> | <i>RTSN: Hockey Arena </i><span class="badge">+0 waiting</span></a>
                        <a href="#" class="list-group-item"><b>9:15pm</b> | <i>RTSN: Bountiful </i><span class="badge">6 spots left</span></a>
                        <a href="#" class="list-group-item"><b>9:30pm</b> | <i>Scrimming 4v4 for anyone </i><span class="badge">TO4</span><span class="badge"><i class="fa fa-star" aria-hidden="true"></i></span></a>
                        <a href="#" class="list-group-item"><b>10:00pm</b> | <i>4v4 scrims </i><span class="badge">TO4</span></a>
                        <a href="#" class="list-group-item"><b>10:00pm</b> | <i>RTSN: Octagon </i><span class="badge">4 spots left</span></a>
                        <a href="#" class="list-group-item"><b>10:15pm</b> | <i>RTSN: Octagon </i><span class="badge">4 spots left</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('/lobbies/create') }}" class="btn btn-primary" role="button">
                        Start a lobby
                    </a>
                </div>
                <div class="col-md-9">
                    <p style="text-align: right;"><a href="{{ url('lobbies') }}">more lobbies...</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
