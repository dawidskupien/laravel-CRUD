<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\peopleController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('skupien/50268/people', [PeopleController::class, 'index']);
Route::get('skupien/50268/people/{id}', [PeopleController::class, 'show']);
Route::post('skupien/50268/people', [PeopleController::class, 'store']);
Route::put('skupien/50268/people/{id}', [PeopleController::class, 'update']);
Route::delete('skupien/50268/people/{id}', [PeopleController::class, 'destroy']);