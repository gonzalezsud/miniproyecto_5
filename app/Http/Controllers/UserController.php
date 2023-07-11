<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
        // return view("usuarios/index"); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("usuarios.create"); //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         "nombre" => ["required"],
    //         "email" => ["required", "email"],
    //         "pass" => ["required"], 
    //     ]);
    //     if ($validator->fails()) {
    //         return back()->with("errorValidator", "Los datos en el formulario no son corrector");
    //     }
    //     // Crear el nuevo usuario
    //     User::create([
    //         'name' => $request->nombre,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->pass)
    //     ]);

    //     // Redireccionar y mostrar mensaje de éxito
    //     return redirect()->back()->with('success', 'Usuario creado exitosamente.');
    // }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        "nombre" => ["required"],
        "email" => ["required", "email"],
        "pass" => ["required"],
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    User::create([
        'name' => $request->nombre,
        'email' => $request->email,
        'password' => Hash::make($request->pass)
    ]);

    return redirect()->route('user.index')->with('success', 'Usuario creado exitosamente.');
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
        $usuario = DB::table("users")->where("id", $id)->first();
        // return $usuario;

        // return view('editar-usuario', compact('usuario')); //
        return view('usuarios.edit', compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $usuario = User::find($id);

    $request->validate([
        'floating_email' => 'required|email',
        'floating_name' => 'required'
    ]);

    $usuario->email = $request->input('floating_email');
    $usuario->name = $request->input('floating_name');
    $usuario->save();

    return redirect()->back()->with('success', 'Información actualizada correctamente.');

}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        // Eliminar el usuario
        $usuario->delete();

        // Puedes agregar lógica adicional aquí, como redireccionar a otra página o mostrar un mensaje de éxito.

        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
