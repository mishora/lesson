<img class="media-objekt img-circle avatar"
	src="{{ $user->present()->gravatar(isset($size) ? $size : 30) }}"
	alt="{{ $user->username }}"
>