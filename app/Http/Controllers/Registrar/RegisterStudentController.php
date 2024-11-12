<?php

namespace App\Http\Controllers\Registrar;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\Academic\StudentsImport;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterStudentController extends Controller
{
    public function index()
    {
        return view('registrar.students.index');
    }

    /**
     * Show the form for creating a new student resource.
     */
    public function registerStudent()
    {
        $courses = Course::where('course_status_id', '1')->get();
        return view('registrar.students.register_student', compact('courses'));
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name.*' => 'required|string|max:20',
            'middle_name.*' => 'nullable|string|max:20',  // Middle name can be optional
            'sur_name.*' => 'required|string|max:20',
            'registration_no.*' => 'required|string|unique:students,registration_no',
            'course_id.*' => 'required|exists:courses,id',
            'picture.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Iterate over each student and process their data
        foreach ($request->first_name as $index => $firstName) {
            // Handle profile picture upload for each student
            $profilePicturePath = null;
            if (isset($request->picture[$index]) && $request->file('picture')[$index] !== null) {
                $file = $request->file('picture')[$index];
                $filePath = 'pictures';
                $fileName = str_replace('/', '_', $request->registration_no[$index]) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($filePath), $fileName);
                $profilePicturePath = $filePath . '/' . $fileName;
            }
            DB::beginTransaction();
    try{
              // Create new student record
       $user= User::create([
        'name' => $request->first_name[$index].' '.$request->middle_name[$index].' '.$request->sur_name[$index],
        'username' => $request->registration_no[$index],
        'password' => bcrypt($request->sur_name[$index]),
        'picture' => $profilePicturePath,
    ]);
    $user->addRole('student');

            // Create the student record
            $student=Student::create([
                'first_name' => $firstName,
                'middle_name' => $request->middle_name[$index] ?? '',
                'sur_name' => $request->sur_name[$index],
                'registration_no' => $request->registration_no[$index],
                'user_id' => $user->id, // Ensure user_id is set here
            ]);

     // Create new student record
     StudentCourse::create([
        'student_id' => $student->id,
                'course_id' => $request->course_id[$index],
    ]);
        DB::commit();

        }
        catch(Exception $e){
            // Success message
            DB::rollback();


        }
        }

        // Success message
        Alert::success('Student Registered', 'Students registered successfully.');
        return redirect()->route('registrar.students');

    }

    /**
     * Remove the specified student from storage.
     */
    public function destroystudent(string $id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('registrar.students')->with('success', 'Student deleted successfully.');
        }
        return redirect()->route('registrar.students')->with('error', 'Student not found.');
    }

    /**
     * Show the form for importing students.
     */
    public function import()
    {
        return view('registrar.students.import_student');
    }

    /**
     * Import students from a file.
     */
    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            'course_id' => 'required|exists:courses,id',
        ]);

        $courseId = $request->input('course_id');
        Excel::import(new StudentsImport($courseId), $request->file('file'));

        return redirect()->route('academic.students')->with('success', 'Students Imported successfully.');
    }
}
