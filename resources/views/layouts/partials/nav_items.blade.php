@if (! auth()->check())
	<li><a href="/register">Registracija</a></li>
	<li><a href="/login">Prijava</a></li>
@else
	<li><a href="/dashboard"><i class="material-icons">av_timer</i></a></li>
	<li><a href="/tickets"><i class="material-icons">assignment</i></a></li>
	<li><a href="/register"><i class="material-icons">person_add</i></a></li>
	<li><a href="/logout"><i class="material-icons">exit_to_app</i></a></li>
	<li><a href="#">{{ auth()->user()->name }}</a></li>
@endif