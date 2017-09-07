@if (! auth()->check())
	<li><a href="/register">Registracija</a></li>
	<li><a href="/login">Prijava</a></li>
@else
	<li><a href="#">{{ auth()->user()->name }}</a></li>
	<li><a href="/logout">Odjava</a></li>
	<li><a href="/tickets">Nalozi</a></li>
@endif