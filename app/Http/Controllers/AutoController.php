<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Tag;


class AutoController extends Controller
{
    public function index()
    {
        $autos = Auto::all();
        return view('autos.index', compact('autos'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('autos.create', compact('tags'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'patente' => 'required|unique:autos',
            'color' => 'required',
            'modelo' => 'required',
            'tag_ids' => 'array|nullable',
            'tag_ids.*' => 'exists:tags,id',
        ]);

        // Crear el auto
        $auto = Auto::create([
            'patente' => $request->patente,
            'color' => $request->color,
            'modelo' => $request->modelo,
        ]);

        // Asociar tags si se seleccionaron
        if ($request->has('tag_ids')) {
            $auto->tags()->attach($request->tag_ids);
        }

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
