
<div class="col-md-<?php echo (12/$columns); ?>">

@if(isSet($miniType) && ($miniType == 'only_image' || $miniType == 'image_only'))

    <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}"><img src="{{ $map->images[0]->path }}" class="img-responsive img-rounded" alt="{{ $map->title }}" title="{{ $map->title }} on {{ $map->game->title }}"></a>

@else


@if($map->featured)
    <div class="panel panel-info">
@else
    <div class="panel panel-default">
@endif

    @if(!isSet($miniType) || $miniType == 'standard' || $miniType == 'std')

        <div class="panel-heading">
        @if(isSet($showGame) && $showGame)
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a> <span style="font-size: 80%;">(<a href="{{ route('maps.game.index', ['game' => $map->game->slug]) }}">{{ $map->game->title }}</a>)</span>
        @else
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a>
        @endif
        </div>
        <div class="panel-body">
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}"><img src="{{ $map->images[0]->path }}" class="img-responsive img-rounded" alt="{{ $map->title }}" title="{{ $map->title }} on {{ $map->game->title }}"></a>
            <br />
            <p>{{ $map->brief }}</p>
        </div>

    @elseif($miniType == 'no_image')

        <div class="panel-heading">
            
        @if(isSet($showGame) && $showGame)
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a> <span style="font-size: 80%;">(<a href="{{ route('maps.game.index', ['game' => $map->game->slug]) }}">{{ $map->game->title }}</a>)</span>
        @else
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a>
        @endif
        </div>
        <div class="panel-body">
            <p>{{ $map->brief }}</p>
        </div>

    @elseif($miniType == 'no_brief')

        <div class="panel-heading">
            
        @if(isSet($showGame) && $showGame)
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a> <span style="font-size: 80%;">(<a href="{{ route('maps.game.index', ['game' => $map->game->slug]) }}">{{ $map->game->title }}</a>)</span>
        @else
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a>
        @endif
        </div>
        <div class="panel-body">
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}"><img src="{{ $map->images[0]->path }}" class="img-responsive img-rounded" alt="{{ $map->title }}" title="{{ $map->title }} on {{ $map->game->title }}"></a>
        </div>

    @elseif($miniType == 'no_title')

        <div class="panel-body">
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}"><img src="{{ $map->images[0]->path }}" class="img-responsive img-rounded" alt="{{ $map->title }}" title="{{ $map->title }} on {{ $map->game->title }}"></a>
            <br />
            <p>{{ $map->brief }}</p>
        </div>

    @elseif($miniType == 'only_brief' || $miniType == 'brief_only')

        <div class="panel-body">
            <p>{{ $map->brief }}</p>
        </div>

    @elseif($miniType == 'only_title' || $miniType == 'title_only')

        <div class="panel-heading">
            
        @if(isSet($showGame) && $showGame)
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a> <span style="font-size: 80%;">(<a href="{{ route('maps.game.index', ['game' => $map->game->slug]) }}">{{ $map->game->title }}</a>)</span>
        @else
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a>
        @endif
        </div>

    @else

        <div class="panel-heading">
            
        @if(isSet($showGame) && $showGame)
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a> <span style="font-size: 80%;">(<a href="{{ route('maps.game.index', ['game' => $map->game->slug]) }}">{{ $map->game->title }}</a>)</span>
        @else
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}">{{ $map->title }}</a>
        @endif
        </div>
        <div class="panel-body">
            <a href="{{ route('maps.show', ['game' => $map->game->slug, 'map' => $map->id, 'slug' => $map->slug]) }}"><img src="{{ $map->images[0]->path }}" class="img-responsive img-rounded" alt="{{ $map->title }}" title="{{ $map->title }} on {{ $map->game->title }}"></a>
            <br />
            <p>{{ $map->brief }}</p>
        </div>

    @endif
    </div>
@endif
</div>
