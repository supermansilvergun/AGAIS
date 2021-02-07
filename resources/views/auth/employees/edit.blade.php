<form method="POST" action="{{ route('employees.update', $employee) }}" rol="form" id="form" enctype="multipart/form-data">
    @method('PUT')
    @section('avatar')
    	<label for="wage">@lang('Photo')</label>
    		@method('PUT')
			<div class="input-group mb-3">
			<!--<div class="input-group-prepend">
				<input class="btn btn-primary" type="button" id="save-image" name="save-image" value="{{ __('Upload') }}">-->
				<input type="file" id="avatar" name="avatar" value="{{ old('note', $employee->avatar ) }}">
			<!--</div>
		  	<div class="custom-file">
			  	<input type="file" class="custom-file-input" id="avatar" name="avatar" value="{{ old('note', $employee->avatar ) }}">
			  	<label class="custom-file-label" for="avatar">@lang('Choose file')</label>
			</div>-->
		</div>
    @endsection
    @include('auth.employees._form')
</form>
<script type="text/javascript">
	$('.btn-update').click(function(event) {
        /* Act on the event */
        event.preventDefault();
        var token       = $('meta[name="csrf-token"]').attr('content');
        var form = $('#form')[0];
        var data = new FormData(form);
        var route = $("#form").attr('action');
        console.log(route);
        console.log(data);

        $.ajax({
        	url: route,
        	type: 'POST',
        	data: data,
        	headers: {'X-CSRF-Token': token},
        	contentType: false,
        	cache: false,
        	processData: false,
        })
        .done(function(data) {
        	console.log(data);
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });
        
    });
</script>