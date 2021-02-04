<form method="POST" action="{{ route('roles.update', $role) }}" rol="form" id="form">
    @method('PUT')
    @include('auth.roles._form')
</form>