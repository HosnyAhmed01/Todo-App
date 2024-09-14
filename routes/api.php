<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTodoController;

Route::get('/', [ApiTodoController::class , 'index']);
Route::post('/create' , [ApiTodoController::class , 'store']);
Route::put('/update/{id}' , [ApiTodoController::class , 'updateData']);
Route::delete('/delete/{id}' , [ApiTodoController::class , 'delete']);