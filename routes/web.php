<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::redirect('/', '/login');


Route::get('/dashboard', function () {
    $totalStudents = Student::count();
    $totalTeachers = Teacher::count();
    $totalDepartments = Department::count();
    $totalCourses = Course::count();

    $latestStudents = Student::with('department')->latest()->take(5)->get();
    $latestTeachers = Teacher::with('department')->latest()->take(5)->get();

    return view('dashboard', compact(
        'totalStudents',
        'totalTeachers',
        'totalDepartments',
        'totalCourses',
        'latestStudents',
        'latestTeachers'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('departments', DepartmentController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('courses', CourseController::class);
});

require __DIR__.'/auth.php';
