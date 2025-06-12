@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Tag: {{ $tag->name ?? 'Sin nombre' }}</h1>
    <p><strong>ID:</strong> {{ $tag->id }}</p>
    <p><strong>Descripción:</strong> {{ $tag->description ?? 'N/A' }}</p>

    <hr>

    <h3>Personas relacionadas</h3>
    @if($tag->personas->isEmpty())
        <p>No hay personas relacionadas con este tag.</p>
    @else
        <ul>
            @foreach($tag->personas as $persona)
                <li>
                    <a href="{{ route('personas.show', $persona->id) }}">
                        {{ $persona->nombre ?? 'Nombre no definido' }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <hr>

    <h3>Autos relacionados</h3>
    @if($tag->autos->isEmpty())
        <p>No hay autos relacionados con este tag.</p>
    @else
        <ul>
            @foreach($tag->autos as $auto)
                <li>
                    <a href="{{ route('autos.show', $auto->id) }}">
                        {{ $auto->modelo ?? 'Modelo no definido' }} - {{ $auto->patente ?? '' }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('tags.index') }}" class="btn btn-secondary mt-3">Volver al listado de tags</a>
</div>
@endsection
