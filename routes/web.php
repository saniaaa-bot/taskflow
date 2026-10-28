<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Jab koi main page khole, toh saare tasks dikhao
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Jab koi form submit kare, toh naya task save karo
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Task delete karne ka route
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Task ka status (Pending/Completed) change karne ka route
Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.status');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');