<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Auto;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::with('autos')->get();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $autos = Auto::all();
        return view('personas.create', compact('autos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'auto_ids' => 'array|nullable',
            'auto_ids.*' => 'exists:autos,id',
        ]);

        $persona = Persona::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        if ($request->has('auto_ids')) {
            $persona->autos()->attach($request->auto_ids);
        }

        return redirect()->route('personas.index')->with('success', 'Persona creada correctamente.');
    }

    public function show(Persona $persona)
    {
        $persona->load('autos');
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        $autos = Auto::all();
        $persona->load('autos');
        return view('personas.edit', compact('persona', 'autos'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|date',
            'auto_ids' => 'array|nullable',
            'auto_ids.*' => 'exists:autos,id',
        ]);

        $persona->update($request->only(['nombre', 'apellido', 'fecha_nacimiento']));

        $persona->autos()->sync($request->auto_ids ?? []);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada.');
    }

    public function destroy(Persona $persona)
    {
        $persona->autos()->detach();
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada.');
    }
}
