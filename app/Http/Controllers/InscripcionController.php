<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Postulante;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inscripcion::all();
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

        \Log::info('Se ha llamado al método store en InscripcionController');
        // Imprimir todos los valores del request
        \Log::info('Datos del Request:', $request->all());

        $request->validate([
            'selectPrograma' => 'required',
            'nombre' => 'required|string',
            'ap' => 'required|string',
            'am' => 'required|string',
            'correo' => 'required|email',
            'dni' => 'required|string',
            'celular' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'departamento' => 'required|string',
            'provincia' => 'required|string',
            'distrito' => 'required|string',
            'direccion' => 'required|string',
            'sexo' => 'required|string',
            'cod_voucher' => 'required|string',
            'voucher' => 'required|string',
            
        ]);

        \Log::info('Los datos han sido validados con éxito.');

        // Crea un nuevo postulante con los datos del request
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

        // Carga y mueve el archivo del voucher al sistema de archivos público
        $voucher = $request->file('voucher');
        $voucherNombre = 'voucher_' . time() . '.' . $voucher->getClientOriginalExtension();
        $voucher->move(public_path('uploads'), $voucherNombre);

        // Crea una nueva inscripción asociada al postulante creado
        $inscripcion = Inscripcion::create([
            'postulante_id' => $postulante->id,
            'programa_id' => $request->selectPrograma,
            'cod_voucher' => $request->cod_voucher,
            'voucher' => '/uploads/' . $voucherNombre, // Guarda la ruta del archivo en la base de datos
            'validado' => 'Pendiente',
            // Agrega los demás campos necesarios para crear una inscripción
        ]);

        return view('constancia');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'postulante_id' => 'exists:postulantes,id',
            'programa_id' => 'exists:programas,id',
            'voucher' => 'file',
            'validado' => 'boolean',
            // Agrega las reglas de validación necesarias para tus campos
        ]);

        // Busca la inscripción por su ID
        $inscripcion = Inscripcion::findOrFail($id);

        // Actualiza la inscripción con los datos del request
        $inscripcion->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $inscripcion = Inscripcion::findOrFail($id);

        // Elimina la inscripción
        $inscripcion->delete();
    }
}
