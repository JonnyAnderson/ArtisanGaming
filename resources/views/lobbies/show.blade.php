@extends('layouts.app')

@section('content')
        


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span style="font-size: 80%; font-weight: 800;"><a href="{{ route('home') }}">Artisan Gaming</a>
             &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; <a href="{{ route('lobbies.index') }}">Lobbies</a>
             &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; {{ $lobby->title }}
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <h1>{{ $lobby->title }} <span style="font-size: 50%"> on {{ $lobby->game->title }}</span>
                    </h1>
                    <h5>on {{ $lobby->dayDateTimeString }}</h5>
                    <p><strong>Host:</strong>
                    @if ($signedIn)
                    {{ $lobby->host->name }} <span style="font-size: 75%;">(Gamertag: {{ $lobby->host->gamertag }})</span>
                    @else
                    <i>Login to see the host</i>
                    @endif
                    </p>
                </div>
                <div class="col-md-3">
                <!-- Right Controls -->
                @if ($signedIn)
                    <a href="{{ route('lobbies.create') }}" class="btn btn-primary pull-right" role="button">
                        Create a new lobby
                    </a>
                @endif
                </div>
            </div>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info col-md-10 col-md-offset-1">
                    - It is the responsibility of the lobby's host to send invitations to the lobby's members.
                    <br />
                    - Lobbies end automatically after 6 hours, but a host may end the lobby early.
                    </div>
                    @if($lobby->isFinished)
                    <div class="alert alert-danger col-md-2 col-md-offset-5"><p style="text-align: center;">Lobby Ended</p></div>
                    @elseif($lobby->isSoon)
                    <div class="alert alert-warning col-md-2 col-md-offset-5"><p style="text-align: center;">Starting Soon</p></div>
                    @elseif($lobby->isLive)
                    <div class="alert alert-success col-md-2 col-md-offset-5"><p style="text-align: center;">Lobby is Live</p></div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">{{ $lobby->description }}</div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <h4>Lobby Members</h4>
                            <div class="list-group">
                                @if($signedIn)
                                <a href="{{ route('users.show', ['user' => $lobby->host->id]) }}" class="list-group-item">{{ $lobby->host->name }} ({{ $lobby->host->gamertag }}) <span class="badge">host</span></a>
                                @else
                                <div class="list-group-item">- - - <i>Login to see</i> - - - <span class="badge">host</span></div>
                                @endif
                                
                                @foreach($lobby->players as $indicatorKey=>$player)

                                    @if($indicatorKey < $lobby->slots_available)
                                        @if($signedIn)
                                        <a href="{{ route('users.show', ['user' => $player->id]) }}" class="list-group-item">{{ $player->name }} ({{ $player->gamertag }})</a>
                                        @else
                                        <div class="list-group-item">- - - <i>Login to see</i> - - -</div>
                                        @endif
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h4>Waitlist</h4>
                            <div class="list-group">
                                @if(($lobby->players->count() - $lobby->slots_available) <= 0)
                                <span class="list-group-item">No one is waiting...</span>
                                @else
                                    @foreach($lobby->players as $indicatorKey=>$player)

                                        @if($indicatorKey >= $lobby->slots_available)

                                            @if($signedIn)
                                            <a href="{{ route('users.show', ['user' => $player->id]) }}" class="list-group-item">{{ $player->name }} ({{ $player->gamertag }})</a>
                                            @else
                                            <div class="list-group-item">- - - <i>Login to see</i> - - -</div>
                                            @endif
                                        
                                        @endif
                                        
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <h4>Media</h4>
                    <p>Feature Coming Soon<br />- See all the screenshots and clips taken by the members of this lobby!</p>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <h4>Stats</h4>
                    <p>Feature Coming Soon<br />- Get a statistical breakdown of the players and their performances in this lobby!</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-group">
            @if ($signedIn)

                @if (($user->isManager() || $lobby->isOwnedBy($user)) && !$lobby->hasEnded())
                <a href="{{ route('lobbies.edit', ['lobby' => $lobby->id]) }}" class="list-group-item list-group-item-warning" data-show-count="false">Edit lobby <span class="badge"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                
                <a href="{{ route('lobbies.end', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item list-group-item-danger" data-show-count="false">End lobby <span class="badge"><i class="fa fa-times" aria-hidden="true"></i></span></a>
                
                @endif

                @unless($lobby->isOwnedBy($user) || $lobby->players->contains($user) || $lobby->hasEnded())
                <a href="{{ route('lobbies.join', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item list-group-item-info" data-show-count="false">Join lobby <span class="badge"><i class="fa fa-plus" aria-hidden="true"></i></span></a>
                @endunless

                @if($lobby->players->contains($user) && !$lobby->hasEnded())
                <a href="{{ route('lobbies.leave', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item list-group-item-danger" data-show-count="false">Leave lobby <span class="badge"><i class="fa fa-minus" aria-hidden="true"></i></span></a>
                @endif

            @else
                <a href="{{ url('login') }}" class="list-group-item list-group-item-info" data-show-count="false">Login to Join lobby <span class="badge"><i class="fa fa-plus" aria-hidden="true"></i></span></a>
            @endif
            </div>
            <div class="list-group">
                <a href="https://twitter.com/intent/tweet?button_hashtag=RTSN Join my lobby at {{ route('lobbies.show', ['lobby' => $lobby->id, 'game' => $lobby->game->slug]) }}" class="list-group-item" data-show-count="false">Tweet this lobby <span class="badge"><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
                <a href="//www.reddit.com/submit" onclick="window.location = '//www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false" class="list-group-item">Submit to Reddit <span class="badge"><i class="fa fa-reddit" aria-hidden="true"></i></span></a>
            </div>
        </div>
    </div>
</div>
@endsection
