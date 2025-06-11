<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class AutoController extends Controller
{
    public function index()
    {
        $autos = Auto::all();
        return view('autos.index', compact('autos'));
    }

    public function create()
    {
        return view('autos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patente' => 'required|unique:autos',
            'color' => 'required',
            'modelo' => 'required',
        ]);

        Auto::create($request->all());

        return redirect()->route('autos.index')->with('success', 'Auto creado correctamente.');
    }

    public function show(Auto $auto)
    {
        return view('autos.show', compact('auto'));
    }

    public function edit(Auto $auto)
    {
        return view('autos.edit', compact('auto'));
    }

    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'patente' => 'required|unique:autos,patente,' . $auto->id,
            'color' => 'required',
            'modelo' => 'required',
        ]);

        $auto->update($request->all());

        return redirect()->route('autos.index')->with('success', 'Auto actualizado correctamente.');
    }

    public function destroy(Auto $auto)
    {
        $auto->delete();

        return redirect()->route('autos.index')->with('success', 'Auto eliminado correctamente.');
    }
}
