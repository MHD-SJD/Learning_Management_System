<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;


Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('lecturers', LecturerController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('exams', ExamController::class);
});

Route::post('/studentsave', [StudentController::class, 'store']);
Route::post('/lecturersave', [LecturerController::class, 'store']);
Route::post('/coursesave', [CourseController::class, 'store']);
Route::post('/examsave', [ExamController::class, 'store']);


Route::get('/', [StudentController::class, 'index']);
Route::post('/studentsave', [StudentController::class, 'store']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/update/{id}', [StudentController::class, 'update']);
Route::post('/student/delete/{id}', [StudentController::class, 'destroy']);



Route::post('/lecturersave', [LecturerController::class, 'store']);
Route::get('/lecturer/edit/{id}', [LecturerController::class, 'edit']);
Route::post('/lecturer/update/{id}', [LecturerController::class, 'update']);
Route::post('/lecturer/delete/{id}', [LecturerController::class, 'destroy']);


Route::post('/coursesave', [CourseController::class, 'store']);
Route::get('/course/edit/{id}', [CourseController::class, 'edit']);
Route::post('/course/update/{id}', [CourseController::class, 'update']);
Route::post('/course/delete/{id}', [CourseController::class, 'destroy']);


require __DIR__.'/auth.php';
