@extends ('layouts.app')

@section ('content')
<form method="POST" action="/tickets">	
	{{ csrf_field() }}
	<div class="card">
		<div class="card-content">
			<h4 class="center-align">Novi nalog</h4>
			<div class="section"></div>
			<div class="row">
			<div class="col s10 offset-l1 offset-m1 offset-s1">

				{{-- Client information --}}
				<div class="col s12 l6">
					<h5 class="center-align">Stranka</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">person</i>
						<input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
						<label for="name">Ime i prezime</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
						<label for="email" data-error="Mora biti email">Email</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">home</i>
						<input id="address" type="text" class="validate" name="address" value="{{ old('address') }}">
						<label for="address">Adresa</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">phone</i>
						<input id="phone" type="text" class="validate" name="phone" value="{{ old('phone') }}">
						<label for="phone">Telefon</label>
					</div>
				</div>
				
				{{-- Device information --}}
				
				<div class="col s12 l6">
					<h5 class="center-align">Uređaj</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">devices</i>
						<input id="device" type="text" class="validate" name="device" value="{{ old('device') }}" required>
						<label for="device">Naziv</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">description</i>
						<input id="issue" type="text" class="validate" name="issue" value="{{ old('issue') }}" required>
						<label for="issue">Opis kvara</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">warning</i>
						<input id="note" type="text" class="validate" name="note" value="{{ old('note') }}">
						<label for="note">Napomena</label>
					</div>
					<div class="section"></div>
					<div class="container center-align">
						<button class="btn waves-effect waves-light primary" type="submit" name="action">Izradi nalog</button>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="section"></div>
	</div>
</form>
@include ('layouts.partials.errors')
@endsection