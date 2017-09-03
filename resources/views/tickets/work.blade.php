<div class="work-content col s12 no-pad">
							<div class="input-field col s12 m5">
								<input id="work[]" type="text" class="validate" name="work[]" value="{{ old('work[]')}}{{ $work }}">
								<label for="work[]">Opis rada</label>				
							</div>
							<div class="input-field col s12 m2">
								<input id="hours[]" type="text" class="validate" name="hours[]" value="{{ old('hours[]')}} ">
								<label for="hours[]">Sati</label>
							</div>
							<div class="input-field col s12 m2">
								<input id="pph[]" type="text" class="validate" name="pph[]" value="{{ old('pph[]')}}">
								<label for="pph[]">Cijena</label>
							</div>
							<div class="input-field col s12 m2">
								<input disabled id="work_total[]" type="text" class="validate" name="work_total[]" value="{{ old('work_total[]') }}">
								<label for="work_total[]">Ukupno</label>
							</div>
							<div class="input-field col s12 m1 center-align">
								<i class="material-icons"><a href="" class="remove-btn">remove</a></i>
							</div>							
						</div>