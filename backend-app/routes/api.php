<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionTypeController;
use App\Http\Controllers\SubjectController;

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
 * /api/{entity}/show/ => Route to show the entity details
 * /api/{entity}/store => Route to create a new entity
 * /api/{entity}/update/ => Route to update the entity
 * /api/{entity}/destroy/{id} => Route to delete the entity
 *
 */

Route::prefix('exams')->group(function () {
    Route::controller(ExamController::class)->group(function () {
        /** CRUD */
        Route::post('/', 'index');
        Route::post('show', 'show');
        Route::post('store', 'store');
        Route::put('update', 'update');
        Route::delete('destroy/{id}', 'destroy');
        // /** Custom */
        Route::post('generate', 'generate');
    });
});

Route::prefix('questions')->group(function () {
    Route::controller(QuestionController::class)->group(function () {
        /** CRUD */
        Route::post('/', 'index');
        Route::post('show', 'show');
        Route::post('store', 'store');
        Route::put('update', 'update');
        Route::delete('destroy/{id}', 'destroy');
    });
});

Route::prefix('answers')->group(function () {
    Route::controller(AnswerController::class)->group(function () {
        /** CRUD */
        Route::get('/', 'index');
        Route::get('show', 'show');
        Route::post('store', 'store');
        // Route::put('update', 'update');
        // Route::delete('destroy/{id}', 'destroy');
    });
});

Route::prefix('types')->group(function () {
    Route::controller(QuestionTypeController::class)->group(function () {
        /** CRUD */
        Route::get('/', 'index');
        // Route::get('show', 'show');
        // Route::post('store', 'store');
        // Route::put('update', 'update');
        // Route::delete('destroy/{id}', 'destroy');
    });
});

Route::prefix('subjects')->group(function () {
    Route::controller(SubjectController::class)->group(function () {
        /** CRUD */
        Route::get('/', 'index');
        // Route::get('show', 'show');
        Route::post('store', 'store');
        // Route::put('update', 'update');
        Route::delete('destroy/{id}', 'destroy');
    });
});

Route::prefix('expertises')->group(function () {
    Route::controller(ExpertiseController::class)->group(function () {
        /** CRUD */
        Route::get('/', 'index');
        // Route::get('show', 'show');
        // Route::post('store', 'store');
        // Route::put('update', 'update');
        // Route::delete('destroy/{id}', 'destroy');
    });
});

