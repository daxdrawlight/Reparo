@extends('layouts.app')

@section ('content')
<div class="row">
		<ul class="collapsible" data-collapsible="accordion">
			@foreach ($tickets as $ticket)
				@include ('tickets.ticket')
			@endforeach
		</ul>
</div>
{{ $tickets->links() }}
@endsection