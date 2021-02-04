@csrf
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="name">@lang('Country')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Country') }}" value="{{ old('name', $country->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="iso2">@lang('Iso2')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="iso2" id="iso2" placeholder="{{ __('Iso2') }}" value="{{ old('iso2', $country->iso2 ) }}" >
		    </div>
			<strong class="invalid-feedback" id="iso2Error"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="iso3">@lang('Iso3')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="iso3" id="iso3" placeholder="{{ __('Iso3') }}" value="{{ old('iso3', $country->iso3 ) }}" >
		    </div>
			<strong class="invalid-feedback" id="iso3Error"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="continent_id">@lang('Continent')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required" name="continent_id" id="continent_id">
		          	<option value="">@lang('Select a continent')</option>
		          	@foreach ($continents as $id => $name) {
		                <option value="{{ $id }}" {{ $country->continent()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
            <strong class="invalid-feedback" id="continent_idError"></strong>
		</div>
	</div>
	<div class="col-md-6">
        <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $country->url ) }}" >
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
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $country->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>