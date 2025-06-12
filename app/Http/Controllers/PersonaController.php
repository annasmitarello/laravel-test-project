<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use function view;
use App\Models\Tag;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $personas = Persona :: all();
        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('personas.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
    {
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required|date',
    ]);

    $persona = Persona::create($request->only(['nombre', 'apellido', 'fecha_nacimiento']));

    // Asociar los tags seleccionados (si los hay)
    if ($request->filled('tag_ids')) {
        $persona->tags()->attach($request->tag_ids);
    }

    return redirect()->route('personas.index')->with('success', 'Persona creada con éxito.');
    }

    
    public function show(Persona $persona)
   {
    return view('personas.show', compact('persona'));
   }

   public function edit(Persona $persona)
   {
    return view('personas.edit', compact('persona'));
  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|date',
        ]);

        $persona->update($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada.');
    }
}
