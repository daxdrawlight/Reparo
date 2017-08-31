@extends('layouts.app')

@section ('content')
<div class="row">
		<ul class="collapsible" data-collapsible="expandable">
			@foreach ($tickets as $ticket)
				@include ('tickets.ticket')
			@endforeach
		</ul>
	</div>
@endsection