<li>
	<div class="collapsible-header">
		<div class="full-width inline-flex">
			<div class="col s10">
				<div class="col s12  truncate">
					<b>
						{{ $user->name }}
					</b>
				</div>
				<div class="col s12 truncate">
					{{ $user->email }}
				</div>
			</div>
			<div class="col s2">
			<div class="col s12">
			@if ($user->role_id != 1)
				<i class="material-icons right">pin_drop</i>
			@else
				<i class="material-icons right">security</i>
				@endif
			</div>
					
			</div>
		</div>
	</div>
	<div class="collapsible-body">
		<div class="full-width inline-flex">
			<div class="col s10 ">
			@if (!empty($user->fullname))
					<div class="col s12 inline-flex truncate">
						<i class="tiny material-icons">title</i>&nbsp;&nbsp;{{ $user->fullname }}
					</div>
			@endif
			@if (!empty($user->address))			
					<div class="col s12 inline-flex truncate ticket-details">
						<i class="tiny material-icons">location_on</i>&nbsp;&nbsp;{{ $user->address }}
					</div>
			@endif
			@if (!empty($user->phone))
				<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">phone</i>&nbsp;&nbsp;{{ $user->phone }}
				</div>
			@endif
			<div class="col s12 inline-flex truncate ticket-details">
					<i class="tiny material-icons">list</i>&nbsp;&nbsp; <a href="/user/{{ $user->id }}/tickets/">Lista naloga</a>
				</div>
			</div>
			<div class="col s2">
				<div class="col s12">
					<a href="/user/edit/{{ $user->id }}"><i class="material-icons right">border_color</i></a>					
				</div>
			</div>
		</div>
	</div>
</li>