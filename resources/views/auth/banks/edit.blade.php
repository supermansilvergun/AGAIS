<form method="POST" action="{{ route('banks.update', $bank) }}" rol="form" id="form">
    @method('PUT')
    @include('auth.banks._form')
</form>