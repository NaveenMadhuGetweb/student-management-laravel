<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;




// Route::apiResource('students', StudentController::class);

// Get all students
Route::get('/students', [StudentController::class, 'index'])->name('api.students.index');

// Create a new student
Route::post('/students', [StudentController::class, 'store'])->name('api.students.store');

// Get a single student
Route::get('/students/{student}', [StudentController::class, 'show'])->name('api.students.show');

// Update a student (PUT)
Route::put('/students/{student}', [StudentController::class, 'update'])->name('api.students.update');

// Update a student (PATCH)
Route::patch('/students/{student}', [StudentController::class, 'update']);

// Delete a student
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('api.students.destroy');
