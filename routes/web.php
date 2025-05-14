<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Curso;

Route::get('/',[HomeController::class,'index']);
Route::get('/curso/create',[HomeController::class,'create']);
Route::post('/curso',[HomeController::class,'store']);
Route::get('/curso/{id}',[HomeController::class,'show']);
Route::get('/curso/{id}/edit',[HomeController::class,'edit']);
Route::put('/curso/{id}',[HomeController::class,'update']);


