<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(UserController::class)->prefix('users')->group(function (){
    Route::post('asign/{type}', 'asignTo');
    Route::get('listParticipants/{id}', 'listParticipants');
    Route::get('listActivities/{id}', 'listActivities');
    Route::get('listIncidences/{id}', 'listIncidences');
});

Route::post('/createActivity', [App\Http\Controllers\ActivityController::class, 'store']);

Route::post('/createIncidence', [App\Http\Controllers\IncidenceController::class, 'store']);
