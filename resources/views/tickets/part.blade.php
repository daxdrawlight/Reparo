<div class="work-content col s12 no-pad">
	<div class="input-field col s12 m5">
		<input type="text" class="validate" name="part[]" value="@if(isset($part)){{ $part }}@endif" >
		<label for="part[]">Naziv komponente</label>				
	</div>
	<div class="input-field col s12 m2">
		<input type="text" class="validate" name="serial[]" value="@if(isset($serial)){{$serial[$key]}}@endif" >
		<label for="serial[]">Serijski broj</label>
	</div>
	<div class="input-field col s12 m2">
		<input type="number" class="validate" name="price[]" value="@if(isset($price)){{$price[$key]}}@endif" >
		<label for="price[]">Cijena</label>
	</div>
	<div class="input-field col s12 m2">
		<input disabled type="text" class="validate" name="parts_total[]" value=" kn">
		<label for="parts_total[]">Ukupno</label>
	</div>
	<div class="input-field col s12 m1 center-align">
		<i class="material-icons"><a href="" class="remove-btn">remove</a></i>
	</div>							
</div>