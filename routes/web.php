<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Proyecto;
use App\Http\Controllers\Proyecto_PersonaController;
use App\Http\Controllers\CuentaBancariaController;



Route::get('/persona/create',[PersonaController::class,'create'])->name('persona.create');
Route::post('/persona',[PersonaController::class,'store'])->name('persona.store');
Route::get('/',[PersonaController::class,'index'])->name('home');
Route::get('/persona/{id}', [PersonaController::class,'show'])->name('persona.show');
Route::get('/persona/{id}/edit', [PersonaController::class, 'edit'])->name('persona.edit');
Route::put('/persona/{id}', [PersonaController::class, 'update'])->name('persona.update');

Route::get('/persona/{id}/pdf', [PersonaController::class, 'generatePdf'])->name('persona.pdf');
Route::get('/persona/{id}/pdf/full', [PersonaController::class, 'generateFullReport'])->name('persona.pdf.full');


Route::get('/cuentabancaria/create', [CuentaBancariaController::class, 'create'])->name('cuentabancaria.create');
Route::post('/cuentabancaria', [CuentaBancariaController::class, 'store'])->name('cuentabancaria.store');
Route::get('/cuentabancaria/show', [CuentaBancariaController::class, 'show'])->name('cuentabancaria.show');
Route::get('/cuentabancaria/{cuentabancaria}/edit', [CuentaBancariaController::class, 'edit'])->name('cuentabancaria.edit');
Route::put('/cuentabancaria/{cuentabancaria}', [CuentaBancariaController::class, 'update'])->name('cuentabancaria.update');



Route::get('/formacion/create', [FormacionController::class, 'create'])->name('formacion.create');
Route::post('/formacion', [FormacionController::class, 'store'])->name('formacion.store');
Route::get('/formacion/show',[FormacionController::class,'show'])->name('formacion.show');
Route::get('/formacion/{formacion}/edit',[FormacionController::class,'edit'])->name('formacion.edit');
Route::put('/formacion/{formacion}',[FormacionController::class,'update'])->name('formacion.update');

Route::get('/proyectos/reasignacion/{proyecto_persona}',[Proyecto_PersonaController::class,'showReassignForm'])->name('proyecto.reasignacion');
Route::post('/proyecto/reasignar', [Proyecto_PersonaController::class, 'storeReassignment'])->name('proyecto.reasignar');
Route::get('/persona/{persona_id}/proyectos/historial', [Proyecto_PersonaController::class, 'historial'])->name('proyecto.historial');

Route::get('/proyecto/create', [Proyecto_PersonaController::class, 'create'])->name('proyecto.create');
Route::post('/proyecto', [Proyecto_PersonaController::class, 'store'])->name('proyecto.store');
Route::get('/proyecto/show',[Proyecto_PersonaController::class,'show'])->name('proyecto.show');
Route::get('/proyecto/{proyecto_persona}/edit',[Proyecto_PersonaController::class,'edit'])->name('proyecto.edit');
Route::put('/proyecto/{proyecto_persona}',[Proyecto_PersonaController::class,'update'])->name('proyecto.update');

Route::get('/crear_proyecto/create', [Proyecto::class, 'create'])->name('crear_proyecto.create');
Route::post('/crear_proyecto', [Proyecto::class, 'store'])->name('crear_proyecto.store');
