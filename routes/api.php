<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CamisetaController;


Route::get('/camisetas',[CamisetaController::class, 'index']);

Route::get('/camisetas/{id}',[CamisetaController::class,'show']);

Route::post('/camisetas', [CamisetaController::class, 'store']);

Route::put('/camisetas/{id}',[CamisetaController::class,'update']);

Route::patch('/camisetas/{id}',[CamisetaController::class,'updatePartial']);

Route::delete('/camisetas/{id}', [CamisetaController::class, 'destroy']);