@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Persona</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<div class="mb-4">
    <label class="block font-medium">Tags</label>
    <select name="tag_ids[]" multiple class="w-full border px-3 py-2 rounded">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tag_ids', $selectedTags ?? [])) ? 'selected' : '' }}>
                {{ $tag->nombre }}
            </option>
        @endforeach
    </select>
</div>
@endsection
