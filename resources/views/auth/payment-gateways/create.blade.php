<form id="form" method="POST" action="{{ route('payment-gateway.store') }}" rol="form">
	@include('auth.payment-gateways._form')
</form>