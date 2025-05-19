<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonaoneController;
use App\Models\Curso;
use App\Http\Controllers\PersonatwoController;

Route::get('/',[HomeController::class,'index'])->name('home');

// Rutas para PersonaoneController
Route::get('/persona/create',[PersonaoneController::class,'create']);
Route::post('/persona',[PersonaoneController::class,'store']);

// Rutas para PersonatwoController
Route::get('/personatwo',[PersonatwoController::class,'index']);

/*Route::get('/curso/create',[HomeController::class,'create'])->name('curso.create');
Route::post('/curso',[HomeController::class,'store'])->name('curso.store');
Route::get('/curso/{id}',[HomeController::class,'show'])->name('curso.show');
Route::get('/curso/{id}/edit',[HomeController::class,'edit'])->name('curso.edit');
Route::put('/curso/{id}',[HomeController::class,'update'])->name('curso.update');*/
Route::resource('curso', HomeController::class)->only([
    'create', 'store', 'show', 'edit', 'update'
]);

