@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size: 80%; font-weight: 800;"><a href="{{ route('home') }}">Artisan Gaming</a>
                @if(isSet($game))
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; <a href="{{ route('maps.index') }}">Maps</a>
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; {{ $game->title }} Maps
                @else
                 &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; Maps
                @endif
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Left Controls -->
                @if(isSet($game))
                <h1>{{ $game->title }} Maps</h1>
                @else
                <h1>Maps</h1>
                @endif
            </div>
            <div class="col-md-6">
                <!-- Right Controls -->
                @if ($signedIn)
                    @if ($user->isManager())
                        <a href="{{ route('maps.create') }}" class="btn btn-primary pull-right" role="button">
                            Post a new map
                        </a>
                    @endif
                @endif
            </div>
        </div>

<?php $columns = 3; ?>

        <div class="row">
@if (count($maps) > 0)
@foreach ($maps as $key=>$map)
            @if($key >= $columns)
        </div>
        <div class="row">
            <?php $key = 0; ?>
            @endif
            <!-- {{ $key }} -->
            @if(isSet($game))
            @include('maps._mini', ['miniType' => 'standard', 'columns' => $columns])
            @else
            @include('maps._mini', ['miniType' => 'standard', 'columns' => $columns, 'showGame' => true])
            @endif
            <!-- {{ $key }} -->

@endforeach
@else
            <div class="col-md-12">
                <p>
                    There are no maps for this game.
                </p>
            </div>

@endif
        </div>
    </div>

@endsection
