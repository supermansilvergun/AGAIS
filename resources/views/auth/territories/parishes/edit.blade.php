<form method="POST" action="{{ route('parishes.update', $parish) }}" rol="form" id="form">
	@method('PUT')
	@include('auth.territories.parishes._form')
</form>