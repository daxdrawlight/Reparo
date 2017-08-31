@extends ('layouts.app')

@section ('content')
	<form method="POST" action="/tickets/edit/{{ $ticket->serial }}">	
		{{ csrf_field() }}
		<div class="card login-card">
			<div class="card-content">
		<div class="row">
			<div class="col s12">
						<h4 class="center-align">{{ $ticket->serial }}</h4>
						<div class="section"></div>
						<h5 class="left-align">Stranka</h5>
						<div class="input-field">
							<input id="name" type="text" class="validate" name="name" value="{{ old('name')}}{{ $ticket->client_name }}" required>
							<label for="name">Ime i prezime</label>
						</div>
						<div class="input-field">
							<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}{{ $ticket->client_email }}">
							<label for="email" data-error="Mora biti email">Email</label>
						</div>
						<div class="input-field">
							<input id="address" type="text" class="validate" name="address" value="{{ old('address') }}{{ $ticket->client_address }}">
							<label for="address">Adresa</label>
						</div>
						<div class="input-field">
							<input id="phone" type="text" class="validate" name="phone" value="{{ old('phone') }}{{ $ticket->client_phone }}">
							<label for="phone">Telefon</label>
						</div>
			</div>
			<div class="col s12">
			<div class="section"></div>
						<h5 class="left-align">Uređaj</h5>
						<div class="input-field">
							<input id="device" type="text" class="validate" name="device" value="{{ old('device') }}{{ $ticket->client_device }}" required>
							<label for="device">Naziv</label>
						</div>
						<div class="input-field">
							<input id="issue" type="text" class="validate" name="issue" value="{{ old('issue') }}{{ $ticket->device_issue }}" required>
							<label for="issue">Opis kvara</label>
						</div>
						<div class="input-field">
							<input id="note" type="text" class="validate" name="note" value="{{ old('note') }}{{ $ticket->device_note }}">
							<label for="note">Napomena</label>
						</div>
						<div class="section"></div>
						<div class="container center-align">
							<button class="btn waves-effect waves-light primary" type="submit" name="action">Spremi</button>
						</div>
			</div>
		</div>
</div></div>
	</form>
@include ('layouts.partials.errors')

@endsection