@extends('layouts.app')

@section ('content')
<div class="row">
	@foreach ($tickets as $ticket)
		@include ('tickets.ticket')
	@endforeach
	</div>
@endsection