@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Registrar Auto</h2>

    <form action="{{ route('autos.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="patente" class="block font-medium">Patente</label>
            <input type="text" name="patente" id="patente"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('patente') }}" required>
            @error('patente') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="color" class="block font-medium">Color</label>
            <input type="text" name="color" id="color"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('color') }}" required>
            @error('color') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="modelo" class="block font-medium">Modelo</label>
            <input type="text" name="modelo" id="modelo"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('modelo') }}" required>
            @error('modelo') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Personas asociadas</label>
            <select name="persona_ids[]" multiple class="w-full border px-3 py-2 rounded">
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}" {{ in_array($persona->id, old('persona_ids', [])) ? 'selected' : '' }}>
                        {{ $persona->nombre }} {{ $persona->apellido }}
                    </option>
                @endforeach
            </select>
            @error('persona_ids') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        <a href="{{ route('autos.index') }}" class="text-gray-600 hover:underline ml-4">Cancelar</a>
    </form>
</div>
@endsection
