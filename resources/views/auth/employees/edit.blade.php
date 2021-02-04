<form method="POST" action="{{ route('employees.update', $employee) }}" rol="form" id="form" enctype="multipart/form-data">
    @method('PUT')
    @section('avatar')
    	<label for="wage">@lang('Photo')</label>
    	<form method="POST" action="{{ route('employees.update', $employee) }}" rol="form" id="formElem" enctype="multipart/form-data">
    		@method('PUT')
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<input class="btn btn-primary" type="submit" id="save-image" name="save-image" value="{{ __('Upload') }}">
				</div>
			  	<div class="custom-file">
				  	<input type="file" class="custom-file-input" id="avatar" name="avatar" value="{{ old('note', $employee->avatar ) }}">
				  	<label class="custom-file-label" for="avatar">@lang('Choose file')</label>
				</div>
			</form>
		</div>
    @endsection
    @include('auth.employees._form')
</form>