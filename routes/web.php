<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::with('type')->latest()->take(6)->get();
    return view('home', compact('projects'));
});

if (app()->environment('local')) {
    Route::get('/_debug_login', function () {
        Auth::loginUsingId(1);
        return redirect('/admin');
    });
}

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        $projectsCount = Project::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('projectsCount', 'usersCount'));
    })->name('dashboard');

    Route::resource('projects', ProjectController::class)->names('admin.projects');

    Route::resource('types', TypeController::class)->names('admin.types');
});

require __DIR__ . '/auth.php';
