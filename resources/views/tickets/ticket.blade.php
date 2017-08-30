    <li>
      <div class="collapsible-header">
      <div class="full-width">
      	<div class="col s8 m10">
      		<div class="col s12 m6  truncate">
      				<b>{{ $ticket->client_device }}</b>
      		</div>
      		<div class="col s12 m6">{{ $ticket->client_name }}</div>
      	</div>
      	<div class="col s4 m2 right-align valign-wrapper" style="height:100%">
      		<div class="col s12">{{ $ticket->created_at->format('D d') }}</div>
      	</div>
      </div>
      </div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>