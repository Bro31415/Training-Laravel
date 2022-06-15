<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TaskController::class, 'index'])->name('home')->middleware(['auth']); // pake route gini itu biar ga ribet2 nanti return redirect di taskcontroller.phpnya

Route::prefix('task')->middleware(['auth'])->group(function () { // midware bentuknya array, jdi bisa tambah lgi itu
    Route::get('/add', [TaskController::class, 'addTask'])->name('task.add');
    Route::get('/{id}/edit', [TaskController::class, 'editTask'])->name('task.edit');
    Route::post('/create', [TaskController::class, 'createTask'])->name('task.create');
    Route::patch('/{id}/update', [TaskController::class, 'updateTask'])->name('task.update');
    Route::delete('/{id}/delete', [TaskController::class, 'deleteTask'])->name('task.delete');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
