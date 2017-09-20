@extends ('layouts.app')

@section ('content')
	<div class="card">
		<div class="card-content">
		<div class="row">
		<div class="col s12"><h4 class="center-align">{{ $ticket->serial }}</h4></div>
		<div class="col s12 m10 offset-m1 offset-l1">
			<div class="col s6 left-align"><i class="tiny material-icons">location_on</i><span>@if(isset($author->fullname)){{ $author->fullname }}@else{{ $author->name }}@endif</div>
			<div class="col s6 right-align"><i class="tiny material-icons">event</i><span> {{ $ticket->created_at->format('d.m.Y') }}</div>
		</div>
		<div class="col s12 m1"></div>
		</div>
			<div class="section"></div>
			<div class="row">
			<div class="col s12 m10 offset-l1 offset-m1">
				{{-- Client information --}}
				<div class="col s12 l6">
					<h5 class="center-align">Stranka</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">person</i>
						<input id="name" type="text" class="validate" name="name" value="{{ $ticket->client_name }}" disabled>
						<label for="name">Ime i prezime</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">phone</i>
						<input id="phone" type="text" class="validate" name="phone" value="{{ $ticket->client_phone }}" disabled>
						<label for="phone">Telefon</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" class="validate" name="email" value="{{ $ticket->client_email }}" disabled>
						<label for="email" data-error="Mora biti email">Email</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">home</i>
						<input id="address" type="text" class="validate" name="address" value="{{ $ticket->client_address }}" disabled>
						<label for="address">Adresa</label>
					</div>
					
				</div>
				
				{{-- Device information --}}
				
				<div class="col s12 l6">
					<h5 class="center-align">Uređaj</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">devices</i>
						<input id="device" type="text" class="validate" name="device" value="{{ $ticket->client_device }}" disabled>
						<label for="device">Naziv</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">description</i>
						<input id="issue" type="text" class="validate" name="issue" value="{{ $ticket->device_issue }}" disabled>
						<label for="issue">Opis kvara</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">warning</i>
						<input id="note" type="text" class="validate" name="note" value="{{ $ticket->device_note }}" disabled>
						<label for="note">Napomena</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">build</i>
					    <select name="status" disabled>
					    	@foreach ($statuses as $status)
					      		<option value="{{ $status->id }}" {{ $ticket->status == $status->id ? "selected" : NULL }}>{{ $status->status }}</option>
					    	@endforeach
					    </select>
					    <label>Status</label>
  					</div>
					<div class="section"></div>
				</div>
			</div>
			</div>
			<div class="ticket-nav">
				
			</div>
			<a href="/tickets/download/{{ $ticket->serial}} " class="button btn waves-effect waves-light ticket-download-button sp-dl-btn"><i class="material-icons">file_download</i></a>
			<a href="/tickets/print/{{ $ticket->serial}} " target="_blank" class="button btn waves-effect waves-light ticket-print-button"><i class="material-icons">print</i></a>
		</div>
		<div class="section"></div>
	</div>
@include ('layouts.partials.errors')

@endsection