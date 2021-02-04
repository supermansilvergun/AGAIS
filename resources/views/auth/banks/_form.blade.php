@csrf
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="name">@lang('Bank')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-university"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Bank') }}" value="{{ old('name', $bank->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-6">
        <div class="form-group">
			<label for="rif">@lang('Rif')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="rif" id="rif" placeholder="{{ __('Rif') }}" value="{{ old('rif', $bank->rif ) }}" >
		    </div>
			<strong class="invalid-feedback" id="rifError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="country_id">@lang('Country')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend" style="width:10%">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required multiple-select" name="country_id[]" id="country_id" data-placeholder="{{ __('Select a country') }}" multiple="multiple" style="width: 90%;">
		            @foreach ($countries as $id => $name) {
		                <option value="{{ $id }}" {{ $bank->countries->pluck('id')->contains($id) ? 'selected' : '<option></option>' }}>{{ $name }}</option>
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
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $bank->url ) }}" >
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
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $bank->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.multiple-select').select2();
    });
</script>