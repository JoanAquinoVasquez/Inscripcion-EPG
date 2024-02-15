<?php

use App\Models\Programa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Facultad;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\InscripcionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    $facultades = Facultad::all(); // Suponiendo que obtienes todas las facultades desde tu base de datos
    $programas_doctorado = Programa::where('grado_id', 1)->get();
    $programas_maestria = Programa::where('grado_id', 2)->get(); 
    $programas_se = Programa::where('grado_id', 3)->get();
    return view('welcome', ['facultades' => $facultades, 'programas_maestria' => $programas_maestria, 'programas_doctorado' => $programas_doctorado,'programas_se' => $programas_se]);
});

Route::post('/confirmacion', [InscripcionController::class, 'store'])->name('guardar.inscripcion');
Route::post('/verificar-cod-voucher', [InscripcionController::class, 'verificarCodigoVoucher'])->name('verificar.cod_voucher');
Route::post('/verificar-dni', [InscripcionController::class, 'verificarDNI'])->name('verificar.dni');

Route::get('/confirmacion', function () {
    return view('confirmacion');
})->name('confirmacion');

// Rutas protegidas por autenticación
Route::middleware(['auth:sanctum'])->group(function () {
    // Ruta para el panel de administración
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});