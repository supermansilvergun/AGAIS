<form method="POST" action="{{ route('documents.update', $document) }}" rol="form" id="form">
    @method('PUT')
    @include('auth.documents._form')
</form>