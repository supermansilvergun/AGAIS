@csrf
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="name">@lang('State')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('State') }}" value="{{ old('name', $state->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-6">
        <div class="form-group">
			<label for="iso">@lang('ISO')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="iso" id="iso" placeholder="{{ __('Iso') }}" value="{{ old('iso', $state->iso ) }}" >
		    </div>
			<strong class="invalid-feedback" id="isoError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="country_id">@lang('Country')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required" name="country_id" id="country_id">
		        	<option value="">@lang('Select a country')</option>
		          	@foreach ($countries as $id => $name) {
		                <option value="{{ $id }}" {{ $state->country()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
            <strong class="invalid-feedback" id="country_idError"></strong>
		</div>
	</div>
	<div class="col-md-6">
        <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $state->url ) }}" >
		    </div>
		    <strong class="invalid-feedback" id="urlError"></strong>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
			<label for="note">@lang('Note')</label>
			<div class="input-group mb-3">
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $state->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>