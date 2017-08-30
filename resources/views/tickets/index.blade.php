@extends('layouts.app')

@section ('content')
<div class="row full-width">
	<div class="col s12">
		<ul class="collapsible" data-collapsible="expandable">
			@foreach ($tickets as $ticket)
				@include ('tickets.ticket')
			@endforeach
		</ul>
	</div>
	</div>
@endsection