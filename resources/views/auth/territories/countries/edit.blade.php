<form method="POST" action="{{ route('countries.update', $country) }}" rol="form" id="form">
	@method('PUT')
	@include('auth.territories.countries._form')
</form>