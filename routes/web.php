<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

    Route::resource('students', StudentController::class)
    ->middleware('auth');

Route::resource('enrollments', EnrollmentController::class)->middleware('auth');

Route::resource('fee-structures', FeeStructureController::class)->middleware('auth');

Route::resource('academic-years', AcademicYearController::class);

Route::resource('courses', CourseController::class)->middleware('auth');
Route::resource('semesters', SemesterController::class);

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
        Route::get('/reports/export-pdf', [ReportController::class, 'exportPdf'])
    ->name('reports.pdf');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('payments', PaymentController::class);
    Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');

});

require __DIR__.'/auth.php';
