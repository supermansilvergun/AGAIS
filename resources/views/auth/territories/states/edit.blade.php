<form method="POST" action="{{ route('states.update', $state) }}" rol="form" id="form">
	@method('PUT')
	@include('auth.territories.states._form')
</form>