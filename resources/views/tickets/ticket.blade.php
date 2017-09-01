<li>
	<div class="collapsible-header">
		<div class="full-width inline-flex">
			<div class="col s10">
				<div class="col s12  truncate">
					<b>
						{{ $ticket->client_device }}
					</b>
				</div>
				<div class="col s12 truncate">
					{{ $ticket->device_issue }}
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
					<i class="tiny material-icons">event</i><span> &nbsp;&nbsp;{{ $ticket->created_at->format('d.m.Y') }}
				</div>			
				<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">person</i>&nbsp;&nbsp;{{ $ticket->client_name }}
				</div>
				<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">location_on</i><span> &nbsp;&nbsp;Computer Centar Viškovo
				</div>
				@if ($ticket->device_note)
				<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">report_problem</i><span> &nbsp;&nbsp;{{ $ticket->device_note }}
				</div>
				@endif
			</div>
			<div class="col s2">
				<div class="col s12">
					<a href="/tickets/edit/{{ $ticket->serial }}"><i class="material-icons right">edit</i></a>					
				</div>
			</div>
		</div>
	</div>
</li>