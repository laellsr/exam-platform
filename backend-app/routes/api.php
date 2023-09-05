<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 *  Default CRUD routes
 *
 * /api/{entity}/ => Route to list the entities
 * /api/{entity}/show/{id} => Route to show the entity details
 * /api/{entity}/store => Route to create a new entity
 * /api/{entity}/update/{id} => Route to update the entity
 * /api/{entity}/destroy/{id} => Route to delete the entity
 *
 */

Route::prefix('exams')->group(function () {
    Route::controller(ExamController::class)->group(function () {
        /** CRUD */
        Route::get('/', 'index');
        Route::get('show/{id}', 'show');
        Route::post('store', 'store');
        Route::put('update/{id}', 'update');
        Route::delete('destroy/{id}', 'destroy');
        /** Custom */
        Route::get('generate', 'generate');
    });
});

Route::controller(QuestionController::class)->group(function () {
    Route::get('/questions', 'index');
    Route::post('/questions/store', 'store');
    // Route::post('/questions/store', 'store');
});

