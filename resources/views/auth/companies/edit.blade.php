<form method="POST" action="{{ route('companies.update', $company) }}" rol="form" id="form">
    @method('PUT')
    @include('auth.companies._form')
</form>