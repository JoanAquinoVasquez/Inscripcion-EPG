<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Postulante::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         // Validación de los datos del formulario
         $request->validate([
            'Ap' => ['required', 'string', 'max:255'],
            'Am' => ['required', 'string', 'max:255'],
            'Nombres' => ['required', 'string', 'max:255'],
            'Correo' => ['required', 'email', 'max:255'],
            'DNI' => ['required', 'string', 'max:255'],
            'Celular' => ['required', 'string', 'max:255'],
            'Fecha_nacimiento' => ['required', 'date'],
            'Sexo' => ['required', 'string', 'max:255'],
            'Departamento' => ['required', 'string', 'max:255'],
            'Provincia' => ['required', 'string', 'max:255'],
            'Distrito' => ['required', 'string', 'max:255'],
            'Direccion' => ['required', 'string'],
        ]);

        // Creación de un nuevo postulante
        $postulante = Postulante::create([
            'nombre' => $request->nombre,
            'ap' => $request->ap,
            'am' => $request->am,
            'correo' => $request->correo,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'departamento' => $request->departamento,
            'distrito' => $request->distrito,
            'provincia' => $request->provincia,
        ]);

        // Redirigir a alguna página después de la creación del postulante
        return redirect()->route('confirmacion');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return Postulante::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
