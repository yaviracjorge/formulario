<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Curso;

Route::get('/',[HomeController::class,'index'])->name('home');
/*Route::get('/curso/create',[HomeController::class,'create'])->name('curso.create');
Route::post('/curso',[HomeController::class,'store'])->name('curso.store');
Route::get('/curso/{id}',[HomeController::class,'show'])->name('curso.show');
Route::get('/curso/{id}/edit',[HomeController::class,'edit'])->name('curso.edit');
Route::put('/curso/{id}',[HomeController::class,'update'])->name('curso.update');*/
Route::resource('curso', HomeController::class)->only([
'create', 'store', 'show', 'edit', 'update'
]);


