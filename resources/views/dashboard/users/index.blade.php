@extends('layouts.app')

@section ('content')
<div class="row">
	<ul class="collapsible" data-collapsible="accordion">
		@foreach ($users as $user)
			@include ('dashboard.users.user')
		@endforeach
	</ul>
</div>
@endsection