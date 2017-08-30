	<div class="col s12 m6">
	<form method="POST" action="/tickets">	
		{{ csrf_field() }}
		<div class="section"></div>
		<div class="card login-card">
			<div class="card-content">
		<div class="row">
			{{-- CLIENT CARD START --}}
			<div class="col s12">
						<h4 class="center-align">Neki nalog</h4>
						<div class="section"></div>
						<h5 class="left-align">Stranka</h5>
						<div class="input-field">
							<input id="name" type="text" class="validate" name="name" value="{{ old('name', $ticket->client_name) }}" required></input>
							<label for="name">Ime i prezime</label>
						</div>
						<div class="input-field">
							<input id="email" type="email" class="validate" name="email" value="{{ $ticket->client_email }}">
							<label for="email" data-error="Mora biti email">Email</label>
						</div>
						<div class="input-field">
							<input id="address" type="text" class="validate" name="address" value="{{ $ticket->client_address }}">
							<label for="address">Adresa</label>
						</div>
						<div class="input-field">
							<input id="phone" type="text" class="validate" name="phone" value="{{ $ticket->client_phone }}">
							<label for="phone">Telefon</label>
						</div>
			</div>
			{{-- CLIENT CARD END --}}
			{{-- DEVICE CARD START --}}
			<div class="col s12">
			<div class="section"></div>
						<h5 class="left-align">Uređaj</h5>
						<div class="input-field">
							<input id="device" type="text" class="validate" name="device" value="{{ $ticket->client_device }}" required>
							<label for="device">Naziv</label>
						</div>
						<div class="input-field">
							<input id="issue" type="text" class="validate" name="issue" value="{{ $ticket->device_issue }}" required>
							<label for="issue">Opis kvara</label>
						</div>
						<div class="input-field">
							<input id="note" type="text" class="validate" name="note" value="{{ $ticket->device_note }}">
							<label for="note">Napomena</label>
						</div>
						<div class="section"></div>
						<button class="btn waves-effect waves-light primary" type="submit" name="action">Spremi</button>
			</div>
			{{-- DEVICE CARD END --}}
		</div>
</div></div>
	</form>
		</div>
@include ('layouts.partials.errors')