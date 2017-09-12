@extends ('layouts.app')

@section ('content')
		<div class="card login-card">
			<div class="card-content">
				<form method="POST" role="form" id="delete" action="/dashboard/user/delete/{{ $user->id }}">	
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button id="delete_usr_btn"class="button btn waves-effect waves-light user-delete-button" type="submit" name="action"><i class="material-icons">delete_forever</i></button>
				</form>
			<form method="POST" role="form" action="/dashboard/user/edit/{{ $user->id }}">	
				{{ csrf_field() }}
				<h4 class="center-align">{{ $user->name }}</h4>
				<div class="section"></div>
				<div class="input-field">
					<input id="enail" type="email" class="validate" name="email" value="@if(!empty($user->email)){{ $user->email }} @endif" required>
					<label for="email">Email</label>
				</div>
				<div class="input-field">
					<input id="fullname" type="text" class="validate" name="fullname" value="@if(!empty($user->fullname)){{ $user->fullname }} @endif">
					<label for="fullname">Naziv</label>
				</div>
				<div class="input-field">
					<input id="address" type="text" class="validate" name="address" value="@if(!empty($user->address)){{ $user->address }} @endif">
					<label for="address">Adresa</label>
				</div>
				<div class="input-field">
					<input id="phone" type="text" class="validate" name="phone" value="@if(!empty($user->phone)){{ $user->phone }} @endif">
					<label for="phone">Telefon</label>
				</div>
				<div class="input-field">
					    <select name="role" @if($user->id == 1) {{ 'disabled' }} @endif>
					    	@foreach ($roles as $role)
					      		<option value="{{ $role->id }}" {{ $user->role_id == $role->id ? "selected" : NULL }}>{{ $role->name }}</option>
					    	@endforeach
					    </select>
					    <label>Uloga</label>
  					</div>
				<div class="section"></div>

				@include ('layouts.partials.errors')

				<div class="container center-align">
	              	<button class="btn waves-effect waves-light primary" type="submit" name="action">Spremi</button>
	            </div>
	            </form>
			</div>
		</div>
@endsection