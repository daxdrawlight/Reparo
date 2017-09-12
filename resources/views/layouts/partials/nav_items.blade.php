@if (auth()->check())
	{{-- <li><a href="/dashboard"><i class="material-icons">av_timer</i><span class="hide-on-large-only">Dashboard</span></a></li> --}}
	<li><a href="/dashboard/settings"><i class="material-icons">settings</i><span class="hide-on-large-only">Postavke</span></a></li>
	<li><a href="/register"><i class="material-icons">person_add</i><span class="hide-on-large-only">Novi korisnik</span></a></li>
	<li><a href="/dashboard/users"><i class="material-icons">people</i><span class="hide-on-large-only">Korisnici</span></a></li>
	<li><a href="/tickets/new"><i class="material-icons">note_add</i><span class="hide-on-large-only">Novi nalog</span></a></li>
	<li><a href="/tickets"><i class="material-icons">description</i><span class="hide-on-large-only">Nalozi</span></a></li>
	<li><a href="#">{{-- {{ auth()->user()->name }} --}}<i class="material-icons">person</i><span class="hide-on-large-only">Profil</span></a></li>
	<li><a href="/logout"><i class="material-icons">exit_to_app</i><span class="hide-on-large-only">Odjava</span></a></li>
@endif