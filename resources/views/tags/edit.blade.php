@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">Editar Tag</h2>
    <form method="POST" action="{{ route('tags.update', $tag) }}">
        @method('PUT')
        @include('tags.form', ['buttonText' => 'Actualizar'])
    </form>
</div>
@endsection
