<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = Clase::all();
        return view('clases.index', compact('clases')); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clases.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
        ]);

        $clase = new Clase;
        $clase->nombre = $request->nombre;
        $clase->save();

        return redirect()->route('clases.index')->with('status', 'Clase agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $clase = DB::table("clases")->where("id", $id)->first();
        // Renderizar la vista de edición y pasar los datos de la clase
        return view('clases.edit', compact('clase'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
 {
        $request->validate([
            'nombre' => ['required'],
            
        ]);
        $clase = Clase::find($id);
        $clase->nombre = $request->nombre;
        $clase->save();
    
        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        $clase->delete();

        return redirect()->route('clases.index')->with('success', 'Clase eliminada exitosamente.');//
    }
}
