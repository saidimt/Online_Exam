<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;

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
Route::middleware('auth','role:instructor|administrator|student|academic')->group(function () {

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
        Route::get('/create-quiz', [ExamController::class, 'create_quiz'])->name('quiz.create');
        Route::get('/create-test', [ExamController::class, 'create_test'])->name('test.create');
        Route::post('/store-exam', [ExamController::class, 'store'])->name('exam.store');

     // Routes for exam, quiz, and test results
     Route::get('/exam/results', [App\Http\Controllers\Results\ExamResultsController::class, 'showResults'])->name('exam.results');
     Route::get('/quiz/results', [App\Http\Controllers\Results\QuizResultsController::class, 'showResults'])->name('quiz.results');
     Route::get('/test/results', [App\Http\Controllers\Results\TestResultsController::class, 'showResults'])->name('test.results');
});







     // Student-specific routes
     Route::prefix('/student')->middleware('auth','role:student')->group(function () {
     Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
     // Grouping InstructorController routes
     Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
     Route::get('/take_quiz',  'take_quiz')->name('take_quiz');
     Route::get('/take_exam',  'take_exam')->name('take_exam');
    Route::get('/take_test',  'take_test')->name('take_test');

    // Add other instructor-specific routes here
});

    // Add more student-specific routes here
});

Route::prefix('/academic')->middleware('auth','role:academic')->group(function () {

    // Grouping InstructorController routes
        Route::controller(\App\Http\Controllers\Academic\HomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('academic.dashboard');
            // Add other instructor-specific routes here
        });
        // Grouping ExamTypesController routes
        Route::controller(\App\Http\Controllers\Academic\ExamTypeController::class)->group(function () {
            Route::get('/exam-types', 'index')->name('academic.exam-types');
            // Route::get('/exam-types', 'create')->name('academic.exam-types.create');
            // Add other instructor-specific routes here
        });
        // Grouping studentController routes
        Route::controller(\App\Http\Controllers\Academic\StudentController::class)->group(function () {
            Route::get('/students', 'index')->name('academic.students');
            Route::get('/students/register', 'create')->name('academic.students.create');
            Route::post('/students/register', 'store')->name('academic.students.store');
            Route::get('/students/import', 'import')->name('academic.students.import');
            Route::post('/students/import', 'importStudents')->name('academic.import.students');
            // Add other instructor-specific routes here
        });
        // Grouping InstructorController routes
        Route::controller(\App\Http\Controllers\Academic\HomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('academic.dashboard');
            // Add other instructor-specific routes here
        });
        // Grouping InstructorController routes
        Route::controller(\App\Http\Controllers\Academic\HomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('academic.dashboard');
            // Add other instructor-specific routes here
        });
});
Route::prefix('/registrar')->middleware('auth','role:registrar')->group(function () {

    // Grouping registrar routes
        Route::controller(\App\Http\Controllers\Registrar\HomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('registrar.dashboard');
            // Add other instructor-specific routes here
        });
        // Grouping RegisterInstructorController routes
        Route::controller(\App\Http\Controllers\Registrar\RegisterInstructorController::class)->group(function () {
            Route::get('/instructors', 'index')->name('registrar.instructors');
            Route::get('/instructors/register', 'registerInstructor')->name('registrar.instructors.registerInstructor');
            Route::post('/instructors/register', 'store')->name('registrar.instructors.store');
            Route::get('/instructors/import', 'import')->name('registrar.instructors.import');
            Route::post('/instructors/import', 'importInstructors')->name('registrar.import.instructors');
            Route::get('/instructors/{id}/update', 'edit')->name('registrar.instructors.edit');
            Route::post('/instructors/update', 'update')->name('registrar.instructors.update');
            Route::delete('/instructors/{id}/delete', 'destroy')->name('registrar.instructors.delete');

            // Route::get('/exam-types', 'create')->name('academic.exam-types.create');
            // Add other instructor-specific routes here
        });
        // Grouping studentController routes
        Route::controller(\App\Http\Controllers\Registrar\RegisterStudentController::class)->group(function () {
            Route::get('/students', 'index')->name('registrar.students');
            Route::get('/students/register', 'registerStudent')->name('registrar.students.registerStudent');
            Route::post('/students/register', 'store')->name('registrar.students.store');
            Route::get('/students/{id}/update', 'edit')->name('registrar.students.edit');
            Route::post('/students/update', 'update')->name('registrar.students.update');
            Route::get('/students/import', 'import')->name('registrar.students.import');
            Route::post('/students/import', 'importStudents')->name('registrar.import.students');
            Route::delete('/students/{id}/delete', 'destroy')->name('registrar.students.delete');
            // Add other instructor-specific routes here
        });


        // Grouping InstructorController routes
        Route::controller(\App\Http\Controllers\Registrar\RegisterCourseController::class)->group(function () {
        //    Course List
            Route::get('/course-lists', 'index')->name('registrar.course-list.index');
            Route::get('/course-lists/create', 'createCourseList')->name('registrar.course-list.create');
            Route::post('/course-lists/register', 'storeCourseList')->name('registrar.course-list.store');
            Route::get('/course-lists/{id}/update', 'editCourseList')->name('registrar.course-list.edit');
            Route::post('/course-lists/update', 'updateCourseList')->name('registrar.course-list.update');
            Route::delete('/course-lists/{id}/delete', 'deleteCourseList')->name('registrar.course-list.delete');

            Route::get('/course-lists/import', 'import')->name('registrar.course-list.import');
            Route::post('/course-lists/import', 'importCourseList')->name('registrar.course-list.import.courses');


        // Courses
        Route::get('/courses', 'allCourses')->name('registrar.course.index');
        Route::get('/courses/create', 'createCourse')->name('registrar.course.create');
        Route::post('/courses/register', 'storeCourse')->name('registrar.course.store');
        Route::get('/courses/{id}/update', 'editCourse')->name('registrar.course.edit');
        Route::post('/courses/update', 'updateCourse')->name('registrar.course.update');
        Route::delete('/courses/{id}/delete', 'deleteCourse')->name('registrar.course.delete');

        Route::get('/courses/import', 'import')->name('registrar.course.import');
        Route::post('/courses/import', 'importCourse')->name('registrar.course.import.courses');

            // Add other instructor-specific routes here
        });

        // Grouping RegistrarController routes
        Route::controller(\App\Http\Controllers\Registrar\RegisterSubjectController::class)->group(function () {
             //    Subject List
            Route::get('/subjects', 'index')->name('registrar.subject.index');
            Route::get('/subjects/create', 'createSubject')->name('registrar.subject.create');
            Route::post('/subjects/register', 'storeSubject')->name('registrar.subject.store');
            Route::get('/subjects/{id}/update', 'editSubject')->name('registrar.subject.edit');
            Route::post('/subjects/update', 'updateSubject')->name('registrar.subject.update');
            Route::delete('/subjects/{id}/delete', 'deleteSubject')->name('registrar.subject.delete');

            Route::get('/subjects/import', 'import')->name('registrar.subject.import');
            Route::post('/subjects/import', 'importSubject')->name('registrar.import.subject');


        // Courses
        Route::get('/course-subjects', 'allCourses')->name('registrar.course-subject.index');
        Route::get('/course-subjects/create', 'createCourseSubject')->name('registrar.course-subject.create');
        Route::post('/course-subjects/register', 'storeCourseSubject')->name('registrar.course-subject.store');
        Route::get('/course-subjects/{id}/update', 'editCourseSubject')->name('registrar.course-subject.edit');
        Route::post('/course-subjects/update', 'updateCourseSubject')->name('registrar.course-subject.update');
        Route::delete('/course-subjects/{id}/delete', 'deleteCourseSubject')->name('registrar.course-subject.delete');

        Route::get('/course-subjects/import', 'import')->name('registrar.course-subjectimport');
        Route::post('/course-subjects/import', 'importCourseSubject')->name('registrar.course-subject.import');

            // Add other instructor-specific routes here
            // Add other instructor-specific routes here
        });
});








