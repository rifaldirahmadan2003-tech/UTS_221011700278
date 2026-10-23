
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [CourseController::class, 'index'])
    ->name('courses.index');

Route::get('/courses/{course}', [CourseController::class, 'show'])
    ->name('courses.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('courses.index')
            ->with('success', 'Login berhasil. Selamat datang di ROOTSPACE!');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
