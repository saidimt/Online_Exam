<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Instructor-specific routes
Route::middleware('auth','role:instructor|administrator|student')->group(function () {
   
    // Add more instructor-specific routes here
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
   
    // Routes for the instruct and student pages
   
    Route::get('/student/take-exam', [ExamController::class, 'studentExam'])->name('exam.start');

    // Route for submitting the exam and viewing results
    Route::post('/student/submit-exam', [ExamController::class, 'submitExam'])->name('exam.submit');
});

// Instructor-specific routes
    Route::prefix('/instructor')->middleware('auth','role:instructor|administrator')->group(function () {
        Route::get('/dashboard', [InstructorController::class, 'index'])->name('instructor.dashboard');
        Route::get('/create-exam', [ExamController::class, 'create'])->name('exam.create');
        Route::get('/create-quizy', [ExamController::class, 'create_quizy'])->name('quizy.create');
        Route::get('/create-test', [ExamController::class, 'create_test'])->name('test.create');

        Route::post('/store-exam', [ExamController::class, 'store'])->name('exam.store');
    // Add more instructor-specific routes here
});

// Student-specific routes
Route::prefix('/student')->middleware('auth','role:student')->group(function () {
Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
Route::get('/take_quizy', [App\Http\Controllers\HomeController::class, 'take_quizy'])->name('take_quizy');
Route::get('/take_exam', [App\Http\Controllers\HomeController::class, 'take_exam'])->name('take_exam');
Route::get('/take_test', [App\Http\Controllers\HomeController::class, 'take_test'])->name('take_test');

    // Add more student-specific routes here
});






// <?php
// kidogo zaman
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ExamController;
// use App\Http\Controllers\InstructorController;
// use App\Http\Controllers\StudentController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
// Route::get('/take_quizy', [App\Http\Controllers\HomeController::class, 'take_quizy'])->name('take_quizy');
// Route::get('/take_exam', [App\Http\Controllers\HomeController::class, 'take_exam'])->name('take_exam');
// Route::get('/take_test', [App\Http\Controllers\HomeController::class, 'take_test'])->name('take_test');

// // Routes for the instructor and student pages
// Route::get('/instructor/create-exam', [ExamController::class, 'create'])->name('exam.create');
// Route::post('/instructor/store-exam', [ExamController::class, 'store'])->name('exam.store');
// Route::get('/student/take-exam', [ExamController::class, 'studentExam'])->name('exam.start');

// // Route for submitting the exam and viewing results
// Route::post('/student/submit-exam', [ExamController::class, 'submitExam'])->name('exam.submit');

// // Routes for instructor and student dashboards
// Route::get('/instructor/dashboard', [InstructorController::class, 'index'])->name('instructor.dashboard')->middleware('auth');
// Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard')->middleware('auth');





// <?php
// old ya zaman
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ExamController;
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
// Route::get('/take_quizy', [App\Http\Controllers\HomeController::class, 'take_quizy'])->name('take_quizy');
// // Route::get('/start-exam', [App\Http\Controllers\HomeController::class, 'startExam'])->name('exam.start');
// Route::get('/take_exam', [App\Http\Controllers\HomeController::class, 'take_exam'])->name('take_exam');
// Route::get('/take_test', [App\Http\Controllers\HomeController::class, 'take_test'])->name('take_test');
// // Routes for the instructor and student pages
// Route::get('/instructor/create-exam', [App\Http\Controllers\ExamController::class, 'create'])->name('exam.create');
// Route::post('/instructor/store-exam', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');
// Route::get('/student/take-exam', [App\Http\Controllers\ExamController::class, 'studentExam'])->name('exam.start');
// // Route for submitting the exam and viewing results
// Route::post('/student/submit-exam', [App\Http\Controllers\ExamController::class, 'submitExam'])->name('exam.submit');

// // web.php the routes for both dashboards,This will ensure that instructors 
// //and students are correctly redirected to their 
// //respective dashboard pages after login.

// Route::get('/instructor/dashboard', [InstructorController::class, 'index'])->name('instructor.dashboard')->middleware('auth');
// Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard')->middleware('auth');





