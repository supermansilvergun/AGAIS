@csrf
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="name">@lang('Parish')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Parish') }}" value="{{ old('name', $parish->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="municipality_id">@lang('Municipality')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <select class="custom-select required" name="municipality_id" id="municipality_id">
		        	<option value="">@lang('Select a municipality')</option>
		          	@foreach ($municipalities as $id => $name) {
		                <option value="{{ $id }}" {{ $parish->municipality()->pluck('id')->contains($id) ? 'selected' : '' }}>{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
            <strong class="invalid-feedback" id="municipality_idError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $parish->url ) }}" >
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
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $parish->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>