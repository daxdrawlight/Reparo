@extends ('layouts.app')

@section ('content')
<!-- REGISTER CARD START -->
	<form method="POST" action="/register">
		{{ csrf_field() }}
		<div class="card login-card">
		<div class="card-content">
			<h4 class="center-align">Registracija</h4>
			<div class="section"></div>
			<div class="input-field">
				<input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
				<label for="name">Korisničko ime</label>
			</div>
			<div class="input-field">
				<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input id="password" type="password" class="validate" name="password" required>
				<label for="password">Lozinka</label>
			</div>
			<div class="input-field">
				<input id="password_confirmation" type="password" class="validate" name="password_confirmation" required>
				<label for="password_confirmation">Ponovi lozinku</label>
			</div>
			<div class="section"></div>
			@include ('layouts.partials.errors')
			<div class="section"></div>
			<div class="container center-align">
				<button class="btn waves-effect waves-light primary" type="submit" name="action">Registrirajte se</button>
			</div>
		</div>
		</div>
	</form>

<!-- REGISTER CARD END -->
@endsection