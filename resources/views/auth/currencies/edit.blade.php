<form method="POST" action="{{ route('currencies.update', $currency) }}" rol="form" id="form">
	@method('PUT')
	@include('auth.currencies._form')
</form>