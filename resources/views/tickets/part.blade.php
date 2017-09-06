<div class="part-content col s12 no-pad">
	<div class="input-field col s12 m5">
		<input type="text" class="validate" name="part[]" value="@if(isset($part)){{ $part }}@endif" autocomplete="off">
		<label for="part[]">Naziv komponente</label>				
	</div>
	<div class="input-field col s12 m4">
		<input type="text" class="validate" name="serial[]" value="@if(isset($serial)){{ $serial[$key] }}@endif" autocomplete="off">
		<label for="serial[]">Serijski broj</label>
	</div>
	<div class="input-field col s12 m2">
		<input type="text" class="validate center-align part-price" name="price[]" value="@if(isset($prices)){{ $prices[$key] }}@endif" autocomplete="off">
		<label for="price[]">Cijena</label>
	</div>
	<div class="input-field col s12 m1 center-align">
		<i class="material-icons"><a href="" class="remove-btn">remove</a></i>
	</div>							
</div>