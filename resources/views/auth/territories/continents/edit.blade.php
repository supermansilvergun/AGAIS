<form method="POST" action="{{ route('continents.update', $continent) }}" rol="form" id="form">
	@method('PUT')
	@include('auth.territories.continents._form')
</form>