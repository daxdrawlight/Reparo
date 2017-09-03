@extends ('layouts.app')

@section ('content')
<form method="POST" role="form" action="/tickets/edit/{{ $ticket->serial }}">	
	{{ csrf_field() }}
	<div class="card">
		<div class="card-content">
			<h4 class="center-align">{{ $ticket->serial }}</h4>
			<div class="section"></div>
			<div class="row">

				{{-- Client information --}}

				<div class="col s12 l4 offset-l1">
					<h5 class="center-align">Stranka</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">person</i>
						<input id="name" type="text" class="validate" name="name" value="{{ old('name')}}{{ $ticket->client_name }}" required>
						<label for="name">Ime i prezime</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}{{ $ticket->client_email }}">
						<label for="email" data-error="Mora biti email">Email</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">home</i>
						<input id="address" type="text" class="validate" name="address" value="{{ old('address') }}{{ $ticket->client_address }}">
						<label for="address">Adresa</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">phone</i>
						<input id="phone" type="text" class="validate" name="phone" value="{{ $ticket->client_phone }}">
						<label for="phone">Telefon</label>
					</div>
				</div>

				<div class="col s0 m0 l1"></div>
				
				{{-- Device information --}}
				
				<div class="col s12 l5">
					<h5 class="center-align">Uređaj</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">devices</i>
						<input id="device" type="text" class="validate" name="device" value="{{ old('device') }}{{ $ticket->client_device }}" required>
						<label for="device">Naziv</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">description</i>
						<input id="issue" type="text" class="validate" name="issue" value="{{ old('issue') }}{{ $ticket->device_issue }}" required>
						<label for="issue">Opis kvara</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">warning</i>
						<input id="note" type="text" class="validate" name="note" value="{{ old('note') }}{{ $ticket->device_note }}">
						<label for="note">Napomena</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">build</i>
					    <select name="status">
					    	@foreach ($statuses as $status)
					      		<option value="{{ $status->id }}" {{ $ticket->status == $status->id ? "selected" : NULL }}>{{ $status->status }}</option>
					    	@endforeach
					    </select>
					    <label>Status</label>
  					</div>
					<div class="section"></div>
				</div>
			</div>
			
			{{-- Advanced details section --}}

			<div class="row">

				{{-- Work information --}}

				<div class="col s12 m10 offset-l1">
					<h5 class="center-align">Radno vrijeme</h5>
					<div class="section"></div>
					<div class="work-row col s12 no-pad">
					<div class="work-content col s12 no-pad center-align">							
								<i class="material-icons"><a href="" class="add-btn">add</a></i>						
					</div>
					@foreach ($work as $work)
								@include ('tickets.work')
					@endforeach
					</div>
				</div>
					<div class="container center-align">
						<button class="btn waves-effect waves-light primary" type="submit" name="action">Spremi</button>
					</div>
			</div>
		</div>
		<div class="section"></div>
	</div>
</form>
@include ('layouts.partials.errors')

@endsection