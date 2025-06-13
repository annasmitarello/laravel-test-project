@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Crear Persona</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personas.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="nombre" class="block font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label for="apellido" class="block font-medium text-gray-700">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label for="fecha_nacimiento" class="block font-medium text-gray-700">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div>
            <label for="auto_ids" class="block font-medium text-gray-700">Autos asociados</label>
            <select name="auto_ids[]" id="auto_ids" multiple
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($autos as $auto)
                    <option value="{{ $auto->id }}" {{ in_array($auto->id, old('auto_ids', [])) ? 'selected' : '' }}>
                        {{ $auto->patente }} - {{ $auto->modelo }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-500">Presioná Ctrl (Cmd en Mac) para seleccionar varios.</small>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('personas.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Guardar</button>
        </div>
    </form>
</div>
@endsection
