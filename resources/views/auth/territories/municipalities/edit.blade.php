<form method="POST" action="{{ route('municipalities.update', $municipality) }}" rol="form" id="form">
	@method('PUT')
	@include('auth.territories.municipalities._form')
</form>