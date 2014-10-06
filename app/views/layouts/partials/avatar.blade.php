<a href="{{ route('profile_path', $user->username) }}">
	<img src="{{ $user->present()->gravatar(isset($size) ? $size : 30) }}" class="media-object img-circle avatar" alt="{{ $user->username }}">
</a>
