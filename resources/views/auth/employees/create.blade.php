<form id="form" method="POST" action="{{ route('employees.store') }}" rol="form" enctype="multipart/form-data">
	@include('auth.employees._form')
</form>