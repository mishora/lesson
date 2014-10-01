@extends('layouts.default')

@section('content')
	<h1>Post a Status</h1>

	@include('layouts.partials.errors')

	{{ Form::open(['route' => 'statuses_path']) }}
		<!-- Ststus Form Input -->
		<div class="form-group">
			{{ Form::label('body', 'Status:') }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}

	<h2>Statuses</h2>
<?php
?>
	@foreach ($statuses as $status)
		<article>
			{{ $status->body }}
		</article>
	@endforeach
@stop
