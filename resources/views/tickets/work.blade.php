<div class="work-content col s12 no-pad">
	<div class="input-field col s12 m5">
		<input type="text" class="validate" name="work[]" value="@if(isset($work)){{ $work }}@endif" autocomplete="off">
		<label for="work[]">Opis rada</label>				
	</div>
	<div class="input-field hours col s12 m2">
		<input type="text" class="validate hours center-align" name="hours[]" value="@if(isset($hours)){{$hours[$key]}}@endif" autocomplete="off">
		<label for="hours[]">Sati</label>
	</div>
	<div class="input-field pph col s12 m2">
		<input type="text" class="validate pph center-align" name="pph[]" value="@if(isset($pphs)){{$pphs[$key]}}@endif" autocomplete="off">
		<label for="pph[]">Cijena</label>
	</div>
	<div class="input-field total col s12 m2">
		<input disabled type="text" class="validate work-total center-align" name="work-total[]" value="@if(isset($work)){{ $totals[$key] }}@endif" autocomplete="off">
		<label for="work-total[]">Ukupno</label>
	</div>
	<div class="input-field col s12 m1 center-align">
		<i class="material-icons"><a href="" class="remove-btn">remove</a></i>
	</div>							
</div>