<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Persona;

class AutoController extends Controller
{
    public function index()
    {
        $autos = Auto::with('personas')->get();
        return view('autos.index', compact('autos'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('autos.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patente' => 'required|unique:autos',
            'color' => 'required',
            'modelo' => 'required',
            'persona_ids' => 'array|nullable',
            'persona_ids.*' => 'exists:personas,id',
        ]);

        $auto = Auto::create([
            'patente' => $request->patente,
            'color' => $request->color,
            'modelo' => $request->modelo,
        ]);

        if ($request->has('persona_ids')) {
            $auto->personas()->attach($request->persona_ids);
        }

        return redirect()->route('autos.index')->with('success', 'Auto creado correctamente.');
    }

    public function show(Auto $auto)
    {
        $auto->load('personas');
        return view('autos.show', compact('auto'));
    }

    public function edit(Auto $auto)
    {
        $personas = Persona::all();
        $auto->load('personas');
        return view('autos.edit', compact('auto', 'personas'));
    }

    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'patente' => 'required|unique:autos,patente,' . $auto->id,
            'color' => 'required',
            'modelo' => 'required',
            'persona_ids' => 'array|nullable',
            'persona_ids.*' => 'exists:personas,id',
        ]);

        $auto->update($request->only(['patente', 'color', 'modelo']));

        $auto->personas()->sync($request->persona_ids ?? []);

        return redirect()->route('autos.index')->with('success', 'Auto actualizado correctamente.');
    }

    public function destroy(Auto $auto)
    {
        $auto->personas()->detach();
        $auto->delete();

        return redirect()->route('autos.index')->with('success', 'Auto eliminado correctamente.');
    }
}
