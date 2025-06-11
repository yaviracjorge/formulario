<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoPersonaController;
use App\Http\Controllers\CuentaBancariaController;

// Página principal
Route::get('/', [PersonaController::class, 'index'])->name('home');

// Persona CRUD y PDFs
Route::resource('persona', PersonaController::class);
Route::get('persona/pdf', [PersonaController::class, 'pdf'])->name('persona.pdf');
Route::get('persona/{persona}/pdf', [PersonaController::class, 'pdfIndividual'])->name('persona.pdf.individual');

// Cuenta bancaria CRUD
Route::resource('cuentabancaria', CuentaBancariaController::class);

// Formación CRUD
Route::resource('formacion', FormacionController::class);

// Proyecto CRUD
Route::resource('proyectos', ProyectoController::class);

// Proyecto-Persona (Asignaciones)
Route::prefix('asignaciones')->group(function () {
    // Mostrar formulario de asignación de proyecto
    Route::get('/create/{persona}', [ProyectoPersonaController::class, 'create'])->name('asignaciones.create');

    // Guardar nueva asignación
    Route::post('/', [ProyectoPersonaController::class, 'store'])->name('asignaciones.store');

    // Editar una asignación existente
    Route::get('/{proyectoPersona}/edit', [ProyectoPersonaController::class, 'edit'])->name('asignaciones.edit');

    // Actualizar asignación
    Route::put('/{proyectoPersona}', [ProyectoPersonaController::class, 'update'])->name('asignaciones.update');

    // Eliminar asignación
    Route::delete('/{proyectoPersona}', [ProyectoPersonaController::class, 'destroy'])->name('asignaciones.destroy');

    // Reasignar proyecto
    Route::get('/reasignacion/{proyectoPersona}', [ProyectoPersonaController::class, 'showReassignForm'])->name('asignaciones.reasignacion');
    Route::post('/reasignar', [ProyectoPersonaController::class, 'storeReassignment'])->name('asignaciones.reasignar');

    // Ver historial de asignaciones de una persona
    Route::get('/persona/{persona}/historial', [ProyectoPersonaController::class, 'historial'])->name('asignaciones.historial');
});
