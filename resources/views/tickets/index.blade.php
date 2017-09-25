@extends('layouts.app')

@section ('content')
<div class="row">
	<ul class="collapsible" data-collapsible="accordion">
		<li>
			<div class="search-box">
				<form method="POST" role="form" action="/search">	
					{{ csrf_field() }}
					<div class="col s12">
					<div class="input-field">
						<div class="input-field">
							<input id="search" type="text" class="validate" name="search" value="@if(isset($query)){{$query}}@endif">
							<label for="search">Pretraga</label>
						</div>
					</div>
					</div>
				</form>
			</div>
		</li>
		@foreach ($tickets as $ticket)
			@include ('tickets.ticket')
		@endforeach
	</ul>
</div>
{{ $tickets->links() }}
@endsection