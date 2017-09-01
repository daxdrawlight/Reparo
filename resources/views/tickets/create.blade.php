@extends ('layouts.app')

@section ('content')
<!-- NEW TICKET FORM START -->
	<form method="POST" action="/tickets">	
		{{ csrf_field() }}
		<div class="card login-card">
			<div class="card-content">
		<div class="row">
			{{-- CLIENT CARD START --}}
			<div class="col s12">
						<h4 class="center-align">Novi nalog</h4>
						<div class="section"></div>
						<h5 class="left-align">Stranka</h5>
						<div class="input-field">
							<input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
							<label for="name">Ime i prezime</label>
						</div>
						<div class="input-field">
							<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
							<label for="email" data-error="Mora biti email">Email</label>
						</div>
						<div class="input-field">
							<input id="address" type="text" class="validate" name="address" value="{{ old('address') }}">
							<label for="address">Adresa</label>
						</div>
						<div class="input-field">
							<input id="phone" type="text" class="validate" name="phone" value="{{ old('phone') }}">
							<label for="phone">Telefon</label>
						</div>
			</div>
			{{-- CLIENT CARD END --}}
			{{-- DEVICE CARD START --}}
			<div class="col s12">
			<div class="section"></div>
						<h5 class="left-align">Uređaj</h5>
						<div class="input-field">
							<input id="device" type="text" class="validate" name="device" value="{{ old('device') }}" required>
							<label for="device">Naziv</label>
						</div>
						<div class="input-field">
							<textarea id="issue" class="validate materialize-textarea" name="issue" required>{{ old('issue') }}</textarea>
							<label for="issue">Opis kvara</label>
						</div>
						<div class="input-field">
							<textarea id="note" class="validate materialize-textarea" name="note">{{ old('note') }}</textarea>
							<label for="note">Napomena</label>
						</div>
						<div class="section"></div>
						<div class="container center-align">
							<button class="btn waves-effect waves-light primary" type="submit" name="action">Izradi nalog</button>
						</div>
			</div>
			{{-- DEVICE CARD END --}}
		</div>
</div></div>
	</form>
@include ('layouts.partials.errors')

<!-- NEW TICKET FORM END -->
@endsection