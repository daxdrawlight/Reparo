@if (auth()->check())
	{{-- <li><a href="/dashboard"><i class="material-icons">av_timer</i><span class="hide-on-large-only">Dashboard</span></a></li> --}}
	@if (auth()->user()->role_id == 1)
		{{-- <li><a href="/dashboard/settings"><i class="material-icons">settings</i></a></li> --}}
		<li><a href="/register"><i class="material-icons">person_add</i></a></li>
		<li><a href="/dashboard/users"><i class="material-icons">people</i></a></li>
		<li><a href="/tickets/new"><i class="material-icons">note_add</i></a></li>
		<li><a href="/tickets"><i class="material-icons">description</i></a></li>
	@endif
	@if (auth()->user()->role_id == 2)
		<li><a href="/tickets/new"><i class="material-icons">note_add</i></a></li>
		<li><a href="/user/tickets"><i class="material-icons">description</i></a></li>
	@endif
		<li><a href="/profile"><i class="material-icons">person</i></a></li>
		<li><a href="/logout"><i class="material-icons">exit_to_app</i></a></li>
@endif