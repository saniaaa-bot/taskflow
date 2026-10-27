<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Jab koi main page khole, toh saare tasks dikhao
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Jab koi form submit kare, toh naya task save karo
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');