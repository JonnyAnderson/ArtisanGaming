@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
        <h1>{{ $profile->name }}'s Profile
        @if ($signedIn)
            @if ($user->isManager())
                <span class="small"><a href="#">
                    edit profile
                </a></span>
            @endif
        @endif
        </h1>
    </div>

    <br />
    <hr />
    <br />
    <div class="alert alert-info"><strong>Feature coming soon.</strong><br />- Expect a lot of great content on user profiles!<br />- If you have any requests, don't hestitate to let me know.</div>

</div>
@endsection
