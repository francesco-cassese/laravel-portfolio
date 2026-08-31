<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
