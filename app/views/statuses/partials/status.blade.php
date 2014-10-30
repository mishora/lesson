<article class="media status-media">
	<div class="pull-left">
		<img class="media-objekt" src="{{ $status->user->present()->gravatar }}" alt=""{{ $status->user->username }}">
	</div>

	<div class="media-body">
		<h4 class="media-heading">{{ $status->user->username }}</h4>
		<p>{{ $status->present()->timeSincePublished() }}</p>
	</div>
	{{ $status->body }}
</article>