<form method="POST" action="{{ route('employees.update', $employee) }}" rol="form" id="form">
    @method('PUT')
    @include('auth.employees._form')
</form>