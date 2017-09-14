<li>
	<div class="collapsible-header">
		<div class="full-width inline-flex">
			<div class="col s10">
				<div class="col s12  truncate">
					<b>
						{{ $ticket->client_name }}
					</b>
				</div>
				<div class="col s12 truncate">
					{{ $ticket->fullname }}
				</div>
				<div class="col s12 truncate">
					<b>{{$ticket->client_device.": "}}</b>{{ $ticket->device_issue }}
				</div>
			</div>
			<div class="col s2">
			<div class="col s12">
				<i class="material-icons right">{{$ticket->icon}}</i>
			</div>
					
			</div>
		</div>
	</div>
	<div class="collapsible-body">
		<div class="full-width inline-flex">
			<div class="col s10 ">
				<div class="col s12 inline-flex truncate">
					<i class="tiny material-icons">title</i>&nbsp;&nbsp;{{ $ticket->serial }}
				</div>
				<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">event</i><span> &nbsp;&nbsp;{{ $ticket->created_at->format('d.m.Y') }}
				</div>			
				{{-- <div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">person</i>&nbsp;&nbsp;{{ $ticket->client_name }}
				</div> --}}
				{{-- <div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">location_on</i><span> &nbsp;&nbsp;{{ $ticket->fullname }}
				</div> --}}
				@if ($ticket->device_note)
				<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">report_problem</i><span> &nbsp;&nbsp;{{ $ticket->device_note }}
				</div>
				@endif
			</div>
			<div class="col s2">
				<div class="col s12">
					@if (auth()->user()->role_id == 2)
						<a href="/user/ticket/{{ $ticket->serial }}"><i class="material-icons right">edit</i></a>
					@else
						<a href="/tickets/edit/{{ $ticket->serial }}"><i class="material-icons right">edit</i></a>
					@endif					
				</div>
			</div>
		</div>
	</div>
</li>