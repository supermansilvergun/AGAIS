@csrf
<div class="row">
	<div class="col-md-6">
        <div class="form-group">
			<label for="name">@lang('Payment Gateway')</label>
			<div class="input-group mb-3">
		        <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-wallet"></i></span>
		        </div>
		        <input type="text" class="form-control required"  name="name" id="name" placeholder="{{ __('Payment Gateway') }}" value="{{ old('name', $payment_gateway->name ) }}" >
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
		        <input type="" class="form-control required"  name="url" id="url" placeholder="{{ __('Url') }}" value="{{ old('url', $payment_gateway->url ) }}" >
		    </div>
		    <strong class="invalid-feedback" id="urlError"></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="form-group">
			<label for="country_id">@lang('Country')</label>
			<div class="input-group mb-3">
		        <!--<div class="input-group-prepend">
		            <span class="input-group-text"><i class="fas fa-globe"></i></span>
		        </div>-->
		        <select class="custom-select required multiple-select" name="country_id[]" id="country_id" data-placeholder="{{ __('Select a country') }}" multiple="multiple" style="width: 100%;">
		            @foreach ($countries as $id => $name) {
		                <option value="{{ $id }}" {{ $payment_gateway->countries->pluck('id')->contains($id) ? 'selected' : '<option></option>' }}>{{ $name }}</option>
		            @endforeach
		        </select>
		    </div>
            <strong class="invalid-feedback" id="country_idError"></strong>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
			<label for="note">@lang('Note')</label>
			<div class="input-group mb-3">
		        <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('Note') }}" >{{ old('note', $payment_gateway->note ) }}</textarea>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.multiple-select').select2();
    });
</script>