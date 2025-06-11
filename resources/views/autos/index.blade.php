@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Listado de Autos</h2>
    <a href="{{ route('autos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Auto</a>

    @if(session('success'))
        <div class="mt-4 bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full mt-6 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">Patente</th>
                <th class="p-2">Color</th>
                <th class="p-2">Modelo</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($autos as $auto)
                <tr>
                    <td class="p-2">{{ $auto->patente }}</td>
                    <td class="p-2">{{ $auto->color }}</td>
                    <td class="p-2">{{ $auto->modelo }}</td>
                    <td class="p-2">
                        <a href="{{ route('autos.show', $auto) }}" class="text-blue-600">Ver</a>
                        <a href="{{ route('autos.edit', $auto) }}" class="text-yellow-600 ml-2">Editar</a>
                        <form action="{{ route('autos.destroy', $auto) }}" method="POST" class="inline ml-2" onsubmit="return confirm('¿Seguro?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center p-4">No hay autos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
