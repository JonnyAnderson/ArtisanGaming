@if(isSet($profile))

<div class="row">
	<div class="col-md-12">
		<span style="font-size: 125%"><a href="{{ route('users.show', ['user' => $profile->name]) }}">{{ $profile->name }}</a></span> <span style="color: #aeaeae;">({{ $profile->gamertag }})</span>
	</div>
</div>

@endif