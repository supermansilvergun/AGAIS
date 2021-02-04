@csrf
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="name">@lang('Company')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-building"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Company') }}" value="{{ old('name', $company->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="rif">@lang('Rif')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="rif" id="rif" placeholder="{{ __('Rif') }}" value="{{ old('rif', $company->rif ) }}" >
		    </div>
			<strong class="invalid-feedback" id="rifError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="scope">@lang('Scope')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required" name="scope" id="scope">
		          	<option value="">@lang('Select a acope')</option>
		          	<option value="L">@lang('Local')</option>
		          	<option value="G">@lang('Global')</option>
		        </select>
		    </div>
			<strong class="invalid-feedback" id="scopeError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="type">@lang('Type')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required" name="type" id="type">
		          	<option value="">@lang('Select a type')</option>
		          	<option value="M">@lang('Micro')</option>
		          	<option value="L">@lang('Little')</option>
		          	<option value="MD">@lang('Middle')</option>
		          	<option value="MA">@lang('Macro')</option>
		        </select>
		    </div>
			<strong class="invalid-feedback" id="typeError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="country_id">@lang('Country')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required multiple-select" name="country_id[]" id="country_id" data-placeholder="{{ __('Select a country') }}" multiple="multiple" style="width: 83%;">
		            @foreach ($countries as $id => $name) {
		                <option value="{{ $id }}" {{ $company->countries->pluck('id')->contains($id) ? 'selected' : '<option></option>' }}>{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
            <strong class="invalid-feedback" id="country_idError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="state_id">@lang('State')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <select class="custom-select required multiple-select" name="state_id[]" id="state_id" data-placeholder="{{ __('Select a state') }}" multiple="multiple" style="width: 84%;">
		          	@foreach ($states as $id => $name) {
		                <option value="{{ $id }}" {{ $company->states()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="state_idError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
	    <div class="form-group">
			<label for="address">@lang('Address')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-building"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="address" id="address" placeholder="{{ __('Address') }}" value="{{ old('address', $company->address ) }}" >
		    </div>
		    <strong class="invalid-feedback" id="addressError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="email">@lang('Email')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
		        </div>
		        <input type="email" class="form-control required"  name="email" id="email" placeholder="{{ __('Email') }}" value="{{ old('email', $company->email ) }}" >
		    </div>
			<strong class="invalid-feedback" id="emailError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="phone">@lang('Phone')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-phone"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="phone" id="phone" placeholder="{{ __('Phone') }}" value="{{ old('phone', $company->phone ) }}" data-inputmask="'mask': ['9999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" im-insert="true">
		    </div>
			<strong class="invalid-feedback" id="phoneError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="backup_phone">@lang('Secondary Phone')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-phone"></i></span>
		        </div>
		        <input type="text" class="form-control"  name="backup_phone" id="backup_phone" placeholder="{{ __('Secondary Phone') }}" value="{{ old('backup_phone', $company->backup_phone ) }}" data-inputmask="'mask': ['9999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" im-insert="true">
		    </div>
			<strong class="invalid-feedback" id="backup_phoneError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="web_site">@lang('Web Site')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="text" class="form-control"  name="web_site" id="web_site" placeholder="{{ __('Web Site') }}" value="{{ old('url', $company->url ) }}" >
		    </div>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $company->url ) }}" >
		    </div>
		    <strong class="invalid-feedback" id="urlError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="form-group">
			<label for="branch_id">@lang('Branch')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <select class="custom-select required multiple-select" name="branch_id[]" id="branch_id" data-placeholder="{{ __('Select a branch') }}" multiple="multiple" style="width: 95%;">
		          	@foreach ($branches as $id => $name) {
		                <option value="{{ $id }}" {{ $company->branches()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="branch_idError"></strong>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
			<label for="note">@lang('Note')</label>
			<div class="input-group mb-3">
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $company->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.multiple-select').select2();
    });
    $('[data-mask]').inputmask();

    $('#country_id').change(function(event) {
        	$.get("/states/combobox/"+event.target.value+"", function(response, country){
        		$('#state_id').empty();
        		for (var i = 0; i < response.length; i++) {
        			$('#state_id').append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
        		}
        	});
        });

        $('#state_id').change(function(event) {
        	$.get("/municipalities/combobox/"+event.target.value+"", function(response, state){
        		$('#municipality_id').empty();
        		for (var i = 0; i < response.length; i++) {
        			$('#municipality_id').append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
        		}
        	});
        });
</script>