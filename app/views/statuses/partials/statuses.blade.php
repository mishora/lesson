
@if($statuses->count())
	@foreach ($statuses as $status)
		@include('statuses.partials.status')
	@endforeach
@else
	This user hasn't yet posted a status.
@endif
