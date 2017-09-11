@extends('layouts.app')

@section('content')
	<div class="collection">
        <a href="#!" class="collection-item">Postavke</a>
        <a href="{{ url('/') }}/dashboard/users" class="collection-item">Korisnici</a>
      </div>
@endsection