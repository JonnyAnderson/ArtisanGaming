@if(isSet($profile))

<div class="row">
	<div class="col-md-12">
		<a href="{{ route('users.show', ['user' => $profile->name]) }}"><img src="/files/images/default/profile_avatar.png" alt="{{ $profile->name }}" class="img-responsive img-circle pull-left" style="height: 25px; width: 25px; margin-right: 7px;" /></a><span style="font-size: 125%"><a href="{{ route('users.show', ['user' => $profile->name]) }}">{{ $profile->name }}</a></span> <span style="color: #aeaeae;">({{ $profile->gamertag }})</span>
	</div>
</div>

@endif