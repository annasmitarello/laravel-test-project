@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Lista de Personas</h1>

    <a href="{{ route('personas.create') }}" class="text-blue-600 hover:underline mb-4 block">+ Nueva Persona</a>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Apellido</th>
                    <th class="px-4 py-2 text-left">Fecha de Nacimiento</th>
                    <th class="px-4 py-2 text-left">Tags</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $persona->nombre }}</td>
                        <td class="px-4 py-2">{{ $persona->apellido }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">
                            @if($persona->tags->isNotEmpty())
                                <ul class="list-disc list-inside">
                                    @foreach($persona->tags as $tag)
                                        <li>{{ $tag->nombre }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-gray-500">Sin tags</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('personas.show', $persona->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('personas.edit', $persona->id) }}" class="text-orange-600 hover:underline ml-2">Editar</a>
                            <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta persona?')" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
