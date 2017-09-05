<div class="work-content col s12 no-pad">
	<div class="input-field col s12 m5">
		<input type="text" class="validate" name="work[]" value="{{ $collection->description }}" >
		<label for="work[]">Opis rada</label>				
	</div>
	<div class="input-field col s12 m2">
		<input type="number" class="validate" name="hours[]" value="{{ $collection->hours }}" >
		<label for="hours[]">Sati</label>
	</div>
	<div class="input-field col s12 m2">
		<input type="number" class="validate" name="pph[]" value="{{ $collection->price }}" >
		<label for="pph[]">Cijena</label>
	</div>
	<div class="input-field col s12 m2">
		<input disabled type="text" class="validate" name="work_total[]" value="{{ $collection->hours * $collection->price }} kn">
		<label for="work_total[]">Ukupno</label>
	</div>
	<div class="input-field col s12 m1 center-align">
		<i class="material-icons"><a href="" class="remove-btn">remove</a></i>
	</div>							
</div>