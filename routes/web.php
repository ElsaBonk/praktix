<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\ApplicationAdminController;
use App\Models\Program;
use App\Models\Application;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->role === 'admin') {

        $programsCount = Program::count();
        $applicationsCount = Application::count();
        $acceptedCount = Application::where('status', 'Accepted')->count();
        $rejectedCount = Application::where('status', 'Rejected')->count();

        return view('dashboard.admin', compact(
            'programsCount',
            'applicationsCount',
            'acceptedCount',
            'rejectedCount'
        ));
    }

    $applications = Application::with('program')
        ->where(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->orWhere('email', $user->email);
        })
        ->latest()
        ->get();

    return view('dashboard.user', compact('applications'));

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| PROGRAMS PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/programs', [ProgramController::class, 'index'])
    ->name('programs.index');

Route::get('/programs/{program}', [ProgramController::class, 'show'])
    ->name('programs.show');

/*
|--------------------------------------------------------------------------
| PROGRAMS ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/programs/create', [ProgramController::class, 'create'])
        ->name('programs.create');

    Route::post('/programs', [ProgramController::class, 'store'])
        ->name('programs.store');

    Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])
        ->name('programs.edit');

    Route::put('/programs/{program}', [ProgramController::class, 'update'])
        ->name('programs.update');

    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])
        ->name('programs.destroy');
});

/*
|--------------------------------------------------------------------------
| APPLY SYSTEM
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/apply/success', function () {
        return view('applications.success');
    })->name('apply.success');

    Route::get('/applications', [ApplicationController::class, 'index'])
        ->name('applications.index');

    Route::get('/apply/{program}', [ApplicationController::class, 'create'])
        ->name('apply.create');

    Route::post('/apply/{program}', [ApplicationController::class, 'store'])
        ->name('apply.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN APPLICATIONS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/applications', [ApplicationAdminController::class, 'index'])
            ->name('admin.applications.index');

        Route::patch('/applications/{application}', [ApplicationAdminController::class, 'updateStatus'])
            ->name('admin.applications.update');
    });

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
