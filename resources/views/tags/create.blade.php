@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">Crear Tag</h2>
    <form method="POST" action="{{ route('tags.store') }}">
        @csrf
        @include('tags.form', ['buttonText' => 'Crear'])
    </form>
</div>
@endsection
