<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario de creación
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:alumnos',
            // Otros campos y reglas de validación que necesites
        ]);

        // Crear un nuevo registro de alumno
        $alumno = new Alumno;
        $alumno->nombre = $request->nombre;
        $alumno->email = $request->email;
        // Establecer otros valores de los campos
        $alumno->save();

        // Redirigir a la vista de índice de alumnos o a donde desees
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
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
        
        $alumno = DB::table("alumnos")->where("id", $id)->first();

        return view('alumnos.edit', compact('alumno'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
 {
        $request->validate([
            'nombre' => ['required'],
            'email' => ['required', 'email']  
        ]);
        $alumno = Alumno::find($id);
        $alumno->nombre = $request->nombre;
        $alumno->email = $request->email;
        $alumno->save();
    
        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminada exitosamente.');//
    }
}
