@csrf
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="name">@lang('Name')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-user"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Name') }}" value="{{ old('name', $employee->name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="nameError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="second_name">@lang('Second Name')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-user"></i></span>
		        </div>
		        <input type="text" class="form-control"  name="second_name" id="second_name" placeholder="{{ __('Second Name') }}" value="{{ old('second_name', $employee->second_name ) }}" >
		    </div>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="last_name">@lang('Last Name')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-user"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="last_name" id="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name', $employee->last_name ) }}" >
		    </div>
			<strong class="invalid-feedback" id="last_nameError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="second_last_name">@lang('Second Last Name')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-user"></i></span>
		        </div>
		        <input type="text" class="form-control"  name="second_last_name" id="second_last_name" placeholder="{{ __('Second Last Name') }}" value="{{ old('second_last_name', $employee->second_last_name ) }}" >
		    </div>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
        	<label for="identification">@lang('Identification')</label>
        	<div class="input-group input-group-msd mb-3">
	            <div class="input-group-prepend">
	                <select class="custom-select btn dropdown-toggle required" name="document_id" id="document_id" data-toggle="dropdown" aria-expanded="false">
	                	<option value=""></option>
			          	@foreach ($documents as $id => $name) {
			                <option value="{{ $id }}" {{ $employee->document()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
			            @endforeach
			        </select>
	            </div>
	            <!-- /btn-group -->
	            <input type="text"class="form-control required"  name="identification" id="identification" placeholder="{{ __('Identification') }}" value="{{ old('identification', $employee->identification ) }}">
            </div>
		    <strong class="invalid-feedback" id="identificationError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="country_id">@lang('Country')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>
		        <select class="custom-select required" name="country_id" id="country_id">
		          	<option value="">@lang('Select a country')</option>
		          	@foreach ($countries as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->country()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="country_idError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
        <div class="form-group">
			<label for="state_id">@lang('State')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <select class="custom-select required" name="state_id" id="state_id">
		          	<option value="">@lang('Select a state')</option>
		          	@foreach ($states as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->state()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="state_idError"></strong>
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
		                <option value="{{ $id }}" {{ $employee->municipality()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="municipality_idError"></strong>
		</div>
	</div>
	<div class="col-md-4">
        <div class="form-group">
			<label for="parish_id">@lang('Parish')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
		        </div>
		        <select class="custom-select required" name="parish_id" id="parish_id">
		          	<option value="">@lang('Select a parish')</option>
		          	@foreach ($parishes as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->parish()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="parish_idError"></strong>
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
		        <input type="text" class="form-control required"  name="address" id="address" placeholder="{{ __('Address') }}" value="{{ old('address', $employee->address ) }}" >
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
		        <input type="email" class="form-control required"  name="email" id="email" placeholder="{{ __('Email') }}" value="{{ old('email', $employee->email ) }}" >
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
		        <input type="text" class="form-control required"  name="phone" id="phone" placeholder="{{ __('Phone') }}" value="{{ old('phone', $employee->phone ) }}" data-inputmask="'mask': ['9999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" im-insert="true">
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
		        <input type="text" class="form-control"  name="backup_phone" id="backup_phone" placeholder="{{ __('Secondary Phone') }}" value="{{ old('backup_phone', $employee->backup_phone ) }}" data-inputmask="'mask': ['9999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" im-insert="true">
		    </div>
			<strong class="invalid-feedback" id="backup_phoneError"></strong>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="birthday_date">@lang('Birthday Date')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
		        </div>
		        <input type="date" class="form-control required"  name="birthday_date" id="birthday_date" placeholder="{{ __('Birthday Date') }}" value="{{ old('birthday_date', $employee->birthday_date ) }}" data-inputmask="'mask': ['9999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" im-insert="true">
		    </div>
			<strong class="invalid-feedback" id="birthday_dateError"></strong>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="hire_date">@lang('Hire Date')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
		        </div>
		        <input type="date" class="form-control required"  name="hire_date" id="hire_date" placeholder="{{ __('Hire Date') }}" value="{{ old('hire_date', $employee->hire_date ) }}" data-inputmask="'mask': ['9999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" im-insert="true">
		    </div>
			<strong class="invalid-feedback" id="hire_dateError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="gender">@lang('Gender')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
		        </div>
		        <select class="custom-select required" name="gender" id="gender">
		          	<option value="">@lang('Select a gender')</option>
		          	<option value="F">@lang('Female')</option>
		          	<option value="M">@lang('Male')</option>
		        </select>
		    </div>
			<strong class="invalid-feedback" id="genderError"></strong>
		</div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
			<label for="url">@lang('Url')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $employee->url ) }}" >
		    </div>
		    <strong class="invalid-feedback" id="urlError"></strong>
		</div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
			<label for="role_id">@lang('Role')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend" style="width:17%">
		            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
		        </div>
		        <select class="custom-select multiple-select required" name="role_id[]" id="role_id" multiple="multiple"  style="width:83%" data-placeholder="{{ __('Select a role') }}">
		          	<option value="">@lang('Select a role')</option>
		          	@foreach ($roles as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->roles->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="role_idError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
	    <div class="form-group">
			<label for="bank_id">@lang('Bank')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend" style="width:17%">
		            <span class="input-group-text"><i class="fas fa-university"></i></span>
		        </div>
		        <select class="custom-select multiple-select required" name="bank_id[]" id="bank_id" multiple="multiple"  style="width:83%" data-placeholder="{{ __('Select a bank') }}">
		          	@foreach ($banks as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->banks->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="bank_idError"></strong>
		</div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
			<label for="payment_gateway_id">@lang('Payment Gateway')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend" style="width:17%">
		            <span class="input-group-text"><i class="fas fa-wallet"></i></span>
		        </div>
		        <select class="custom-select multiple-select required" name="payment_gateway_id[]" id="payment_gateway_id" multiple="multiple"  style="width:83%" data-placeholder="{{ __('Select a Payment Gateway') }}">
		          	@foreach ($payment_gateways as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->paymentGateways->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="payment_gateway_idError"></strong>
		</div>
	</div>
	<div class="col-md-4">
	    <div class="form-group">
			<label for="company_id">@lang('Company')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend" style="width:17%">
		            <span class="input-group-text"><i class="fas fa-wallet"></i></span>
		        </div>
		        <select class="custom-select required" name="company_id" id="company_id" data-placeholder="{{ __('Select a company') }}">
		          	<option value="">@lang('Select a company')</option>
		          	@foreach ($companies as $id => $name) {
		                <option value="{{ $id }}" {{ $employee->company()->pluck('id')->contains($id) ? 'selected' : '<option></option>' }} >{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
		    <strong class="invalid-feedback" id="company_idError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	    <div class="form-group">
			<label for="wage">@lang('Wage')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
		        </div>
		        <input type="text" class="form-control"  name="wage" id="wage" placeholder="{{ __('Wage') }}" value="{{ old('wage', $employee->wage ) }}" >
		    </div>
		</div>
	</div>
	<div class="col-md-6">
	    <div class="form-group">
	    	<label for="wage">@lang('Photo')</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<button class="btn btn-primary" type="button" id="button-addon1">@lang('Upload')</button>
				</div>
			  	<div class="custom-file">
				  	<input type="file" class="custom-file-input" id="avatar" name="avatar" value="{{ old('note', $employee->avatar ) }}">
				  	<label class="custom-file-label" for="customFile">@lang('Choose file')</label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
			<label for="note">@lang('Note')</label>
			<div class="input-group mb-3">
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $employee->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.multiple-select').select2();
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

        $('#municipality_id').change(function(event) {
        	$.get("/parishes/combobox/"+event.target.value+"", function(response, municipality){
        		$('#parish_id').empty();
        		for (var i = 0; i < response.length; i++) {
        			$('#parish_id').append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
        		}
        	});
        });
    });
</script>
<style type="text/css">
	.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
</style>