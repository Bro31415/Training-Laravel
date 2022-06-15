<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskAPIController;
use App\Http\Controllers\TaskController;
use App\Models\Task;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test', function () {
    return response()->json([
        'message' => 'Hello, welcome to test'
    ]);
});

Route::prefix('task')->group(function () {
    Route::post('/create', [TaskAPIController::class, 'createTask'])->name('api.task.create');
    Route::get('/all', [TaskAPIController::class, 'getAllTasks']); // Ambil semua task dari DB
    Route::get('/{id}/view', [TaskAPIController::class, 'getTaskById']); // Ambil 1 task dari DB
    Route::patch('/{id}/update', [TaskAPIController::class, 'updateTask'])->name('api.task.update');
    Route::delete('/{id}/delete', [TaskController::class, 'deleteTask'])->name('api.task.delete');
});