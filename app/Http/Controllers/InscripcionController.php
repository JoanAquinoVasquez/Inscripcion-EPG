<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Postulante;
use Illuminate\Database\QueryException;

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
            'id_programa' => 'required|string',
            'nombre' => 'required|string',
            'ap' => 'required|string',
            'am' => 'required|string',
            'correo' => 'required|email',
            'dni' => 'required|unique:postulantes,dni',
            'celular' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'departamento' => 'required|string',
            'provincia' => 'required|string',
            'distrito' => 'required|string',
            'direccion' => 'required|string',
            'sexo' => 'required|string',
            'cod_voucher' => 'required|string',
        ]);

        \Log::info('Los datos han sido validados con éxito.');

            // Crea un nuevo postulante con los datos del request
            $postulante = Postulante::create([
                'Nombres' => $request->nombre,
                'Ap' => $request->ap,
                'Am' => $request->am,
                'Correo' => $request->correo,
                'DNI' => $request->dni,
                'Celular' => $request->celular,
                'Direccion' => $request->direccion,
                'Sexo' => $request->sexo,
                'Fecha_nacimiento' => $request->fecha_nacimiento,
                'Departamento' => $request->departamento,
                'Distrito' => $request->distrito,
                'Provincia' => $request->provincia,
            ]);



        \Log::info('si se registro estudiante supuestamente');

        // Carga y mueve el archivo del voucher al sistema de archivos público
        $voucher = $request->file('voucher');
        $voucherNombre = 'voucher_' . time() . '.' . $voucher->getClientOriginalExtension();
        $voucher->move(public_path('uploads'), $voucherNombre);

        // Crea una nueva inscripción asociada al postulante creado
        $inscripcion = Inscripcion::create([
            'postulante_id' => $postulante->id,
            'programa_id' => $request->id_programa,
            'cod_voucher' => $request->cod_voucher,
            'voucher' => '/uploads/' . $voucherNombre, // Guarda la ruta del archivo en la base de datos
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
