@extends ('layouts.app')

@section ('content')
	<div class="card">
		<div class="card-content">
		<div class="row">
		<div class="col s12"><h4 class="center-align">{{ $ticket->serial }}</h4></div>
		<div class="col s12 m10 offset-m1 offset-l1">
			<div class="col s6 left-align"><span>@if(isset($author->fullname)){{ $author->fullname }}@else{{ $author->name }}@endif</div>
			<div class="col s6 right-align"><span> {{ $ticket->created_at->format('d.m.Y') }}</div>
		</div>
		<div class="col s12 m1"></div>
		</div>
			<form method="POST" role="form" action="/user/ticket/{{ $ticket->serial }}">	
				{{ csrf_field() }}
			<div class="section"></div>
			<div class="row">
			<div class="col s12 m10 offset-l1 offset-m1">
				{{-- Client information --}}

				<div class="col s12 l6">
					<h5 class="center-align">Stranka</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">person</i>
						<input id="name" type="text" class="validate" name="name" value="{{ $ticket->client_name }}" required>
						<label for="name">Ime i prezime</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">phone</i>
						<input id="phone" type="text" class="validate" name="phone" value="{{ $ticket->client_phone }}">
						<label for="phone">Telefon</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" class="validate" name="email" value="{{ $ticket->client_email }}">
						<label for="email" data-error="Mora biti email">Email</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">home</i>
						<input id="address" type="text" class="validate" name="address" value="{{ $ticket->client_address }}">
						<label for="address">Adresa</label>
					</div>
					
				</div>
				
				{{-- Device information --}}
				
				<div class="col s12 l6">
					<h5 class="center-align">Uređaj</h5>
					<div class="section"></div>
					<div class="input-field">
						<i class="material-icons prefix">devices</i>
						<input id="device" type="text" class="validate" name="device" value="{{ $ticket->client_device }}" required>
						<label for="device">Naziv</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">description</i>
						<input id="issue" type="text" class="validate" name="issue" value="{{ $ticket->device_issue }}" required>
						<label for="issue">Opis kvara</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">warning</i>
						<input id="note" type="text" class="validate" name="note" value="{{ $ticket->device_note }}">
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
			{{-- Advanced details section --}}

			<div class="row">

				{{-- Work information --}}
				<div class="col s12">
					<div class="section"></div>
					<div class="divider"></div>
					<div class="section"></div>
				</div>
				<div class="col s12 m12 l10 offset-l1">
					<div class="work-row col s12 no-pad">
					<div class="col s12 no-pad center-align">							
						<div class="col s12 left-align"><h5>Utrošeno radno vrijeme</h5></div>
						<div class="col s12"><div class="section"></div></div>								
					</div>
					@if (!empty($works))
						@foreach ($works as $key => $work)
							@include ('dashboard.users.ticket.work')
						@endforeach
					@else
						@include ('dashboard.users.ticket.work')
					@endif
					</div>
				</div>
				{{-- Parts information --}}
				<div class="col s12">
					<div class="section"></div>
					<div class="divider"></div>
					<div class="section"></div>
				</div>
				<div class="col s12 m12 l10 offset-l1">
					<div class="col s6"><h5>PROVIZIJA</h5></div>
					<div class="col s6">
						@if(isset($provizija))
							<input disabled type="text" class="validate center-align total-price" style="font-size: 24px;"name="provizija" value="{{ $provizija }} kn" autocomplete="off">
						@endif
					</div>
				</div>
				<div class="col s12 center-align">
					<div class="section"></div>
					<button class="button btn waves-effect waves-light ticket-save-button" type="submit" name="action"><i class="material-icons">save</i></button>
				</div>
			</div>
			</form>
			<div class="ticket-nav">
				
			</div>
			<a href="/tickets/download/{{ $ticket->serial}} " class="button btn waves-effect waves-light ticket-download-button sp-dl-btn"><i class="material-icons">file_download</i></a>
			<a href="/tickets/print/{{ $ticket->serial}} " target="_blank" class="button btn waves-effect waves-light ticket-print-button"><i class="material-icons">print</i></a>
		</div>
		<div class="section"></div>
	</div>
@include ('layouts.partials.errors')

@endsection