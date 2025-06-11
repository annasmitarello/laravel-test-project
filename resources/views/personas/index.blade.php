@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Personas</h1>
        <a href="{{ route('personas.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            + Nueva Persona
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3 text-sm font-medium">Nombre</th>
                    <th class="px-6 py-3 text-sm font-medium">Apellido</th>
                    <th class="px-6 py-3 text-sm font-medium">Fecha de Nacimiento</th>
                    <th class="px-6 py-3 text-sm font-medium text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-800">
                @forelse ($personas as $persona)
                    <tr>
                        <td class="px-6 py-4">{{ $persona->nombre }}</td>
                        <td class="px-6 py-4">{{ $persona->apellido }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('personas.show', $persona) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('personas.edit', $persona) }}" class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('personas.destroy', $persona) }}" method="POST" class="inline"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar esta persona?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hay personas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
