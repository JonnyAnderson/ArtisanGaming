@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <!-- Left Controls -->
                <h1>
                @if(isSet($game))
                {{ $game->title }} 
                @endif
                Lobbies
                </h1>
            </div>
            <div class="col-md-6">
                <!-- Right Controls -->
                @if ($signedIn)
                    <a href="{{ route('lobbies.create') }}" class="btn btn-primary pull-right" role="button">
                        Create a new lobby
                    </a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-1">
                <p>If you're looking for a team of gamers to compete with or just a casual game to play, this is the place. You can create a lobby for others to join or join one from the list below.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
@if (count($lobbies) > 0)
                <div class="list-group">
@foreach ($lobbies as $lobby)
                    
                @if($lobby->isFinished)
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item list-group-item-danger" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>Finished</b>
                @elseif($lobby->isLive)
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item list-group-item-success" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>{{ $lobby->fromNowHuman }}</b>
                @elseif($lobby->isSoon)
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item list-group-item-warning" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>{{ $lobby->fromNowHuman }}</b>
                @elseif($lobby->isToday)
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>{{ $lobby->timeHuman }}</b>
                @elseif($lobby->isTomorrow)
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>Tomorrow, {{ $lobby->timeHuman }}</b>
                @elseif($lobby->isThisWeek)
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>{{ $lobby->dayOfWeekTimeHuman }}</b>
                @else
                    <a href="{{ route('lobbies.show', ['game' => $lobby->game->slug, 'lobby' => $lobby->id]) }}" class="list-group-item" title="{{ $lobby->description }}"><i class="fa fa-users" aria-hidden="true"></i> | <b>{{ $lobby->dayDateTimeString }}</b>
                @endif
                     | <i>{{ $lobby->title }} <span style="font-size: 70%;">({{ $lobby->slots_available }} spots left)</span></i><span class="badge" title="This lobby will be played on {{ $lobby->game->title }}">{{ $lobby->game->title }}</span>
                    @if($lobby->security == "request")
                        <span class="badge" title="Players must request to join this lobby."><i class="fa fa-lock" aria-hidden="true"></i></span>
                    @elseif($lobby->security == "password")
                        <span class="badge" title="Players must enter a password to join this lobby."><i class="fa fa-key" aria-hidden="true"></i></span>
                    @else
                        
                    @endif
                    </a>
@endforeach
                </div>
@else
                <p>
                    @if(isSet($game))
                    Looks like there aren't any open lobbies for {{ $game->title }} right now...
                    @else
                    Looks like there aren't any open lobbies right now...
                    @endif
                </p>
@endif
            </div>
        </div>
    </div>

@endsection


