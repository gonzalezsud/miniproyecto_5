<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;
use Illuminate\Support\Facades\DB;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maestros = Maestro::all();
        return view('maestros.index', compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maestros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:maestros'
        ]);

        Maestro::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            // Otros campos de la tabla
        ]);

        return redirect()->route('maestros.index')->with('status', 'Maestro agregado exitosamente.');
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
    
    // public function edit(Maestro $maestro)
    public function edit(string $id)

    {
        
        $maestro = DB::table("maestros")->where("id", $id)->first();

        return view('maestros.edit', compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
 {
        $request->validate([
            'nombre' => ['required'],
            'correo' => ['required', 'email']  
        ]);
        $maestro = Maestro::find($id);
        $maestro->nombre = $request->nombre;
        $maestro->email = $request->correo;
        $maestro->save();
    
        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maestro $maestro)
    {
        // Realizar lógica de eliminación del maestro
        $maestro->delete();

        // Redireccionar a una ruta o realizar cualquier acción adicional después de eliminar el maestro
        return redirect()->route('maestros.index')->with('success', 'Maestro eliminado exitosamente.');
    }
}
    