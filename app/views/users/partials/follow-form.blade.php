@if ($user->isFollowedBy($me))

	{{ Form::Open(['method' => 'DELETE', 'route' => ['follow_path', $user->id]]) }}

		{{ Form::hidden('userIdToUnfollow', $user->id) }}
		<button type="submit" class="btn btn-danger">Unfollow {{ $user->username }}</button>

	{{ Form::close() }}

@else

	{{ Form::Open(['route' => 'follows_path']) }}

		{{ Form::hidden('userIdToFollow', $user->id) }}
		<button type="submit" class="btn btn-primary">Follow {{ $user->username }}</button>

	{{ Form::close() }}

@endif
