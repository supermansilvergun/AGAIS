<form method="POST" action="{{ route('payment-gateway.update', $payment_gateway) }}" rol="form" id="form">
    @method('PUT')
    @include('auth.payment-gateways._form')
</form>