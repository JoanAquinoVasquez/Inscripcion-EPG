<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Actions\Fortify\CreateNewUser;


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
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware(['auth:sanctum'])->group(function () {
    // Ruta para el panel de administración
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});