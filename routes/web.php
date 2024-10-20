<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/take_quizy', [App\Http\Controllers\HomeController::class, 'take_quizy'])->name('take_quizy');
// Route::get('/start-exam', [App\Http\Controllers\HomeController::class, 'startExam'])->name('exam.start');
Route::get('/take_exam', [App\Http\Controllers\HomeController::class, 'take_exam'])->name('take_exam');
Route::get('/take_test', [App\Http\Controllers\HomeController::class, 'take_test'])->name('take_test');
// Routes for the instructor and student pages
Route::get('/instructor/create-exam', [App\Http\Controllers\ExamController::class, 'create'])->name('exam.create');
Route::post('/instructor/store-exam', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');
Route::get('/student/take-exam', [App\Http\Controllers\ExamController::class, 'studentExam'])->name('exam.start');
// Route for submitting the exam and viewing results
Route::post('/student/submit-exam', [App\Http\Controllers\ExamController::class, 'submit.Exam'])->name('exam.submit');



