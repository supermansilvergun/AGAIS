@csrf
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="name">@lang('Name')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-user"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Name') }}" value="{{ old('name', $document->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="acronym">@lang('Acronym')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-font"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="acronym" id="acronym" placeholder="{{ __('Acronym') }}" value="{{ old('acronym', $document->acronym ) }}" >
		    </div>
			<strong class="invalid-feedback" id="acronymError"></strong>
		</div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $document->url ) }}" >
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
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $document->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>