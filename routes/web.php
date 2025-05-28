<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Proyecto_PersonaController;



Route::get('/persona/create',[PersonaController::class,'create'])->name('persona.create');
Route::post('/persona',[PersonaController::class,'store']);
Route::get('/',[PersonaController::class,'index'])->name('home');
Route::get('/persona/{id}', [PersonaController::class,'show'])->name('persona.show');



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

//Route::put('/proyecto/{proyecto_persona}',[Proyecto_PersonaController::class,'update'])->name('proyecto.update');

/*Route::get('/curso/create',[HomeController::class,'create'])->name('curso.create');
Route::post('/curso',[HomeController::class,'store'])->name('curso.store');
Route::get('/curso/{id}',[HomeController::class,'show'])->name('curso.show');
Route::get('/curso/{id}/edit',[HomeController::class,'edit'])->name('curso.edit');
Route::put('/curso/{id}',[HomeController::class,'update'])->name('curso.update');*/
Route::resource('curso', HomeController::class)->only([
    'create', 'store', 'show', 'edit', 'update'
]);