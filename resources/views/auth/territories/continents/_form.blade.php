@csrf
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="name">@lang('Continent')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Continent') }}" value="{{ old('name', $continent->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-6">
        <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('name', $continent->url ) }}" >
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
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('name', $continent->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>
