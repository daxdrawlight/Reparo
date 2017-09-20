@extends('layouts.app')

@section ('content')

<form method="POST" action="/status">
		{{ csrf_field() }}
		<div class="card">
		<div class="card-content">
			<h4 class="center-align">Status naloga</h4>
			<div class="section"></div>
			<div class="input-field">
				<input id="serial" type="text" class="validate" name="serial" value="" required>
				<label for="serial">Broj naloga</label>
			</div>
			<div class="section"></div>
			@include ('layouts.partials.errors')
			<div class="container center-align">
				<button class="btn waves-effect waves-light primary" type="submit" name="action">Provjeri</button>
			</div>
			<div class="section"></div>
		</div>
		</div>
	</form>

@endsection