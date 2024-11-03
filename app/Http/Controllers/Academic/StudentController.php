<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Imports\Academic\StudentsImport;
use Illuminate\Http\Request;
use App\Models\{Student,User,StudentCourse};
use Maatwebsite\Excel\Facades\Excel;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.register_student');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:20',
            'registration_no' => 'required|string|max:100|unique:students,registration_no',
            'course_id' => 'required|string',
            'sur_name' => 'required|string|max:20',
            'middle_name' => 'required|string|max:20',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        // $profilePicturePath = $request->file('picture')->store('pictures', 'public');
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            
            // Define the file path in the public folder
            $filePath = 'pictures';
            
            // Generate a unique file name
            $fileName = str_replace('/','_',$request->registration_no). $file->getClientOriginalName();
            
            // Move the file to public/pictures
            $file->move(public_path($filePath), $fileName);
            
            // Save the file path in the database, if needed
            $profilePicturePath = $filePath . '/' . $fileName;
    
            // Save to database (example)
            // $student = new Student();
            // $student->picture = $profilePicturePath;
            // $student->save();
        }
        // Create new student record
       $user= User::create([
            'name' => $request->first_name.' '.$request->middle_name.' '.$request->sur_name,
            'username' => $request->registration_no,
            'password' => bcrypt($request->sur_name),
            'picture' => $profilePicturePath,
        ]);
        $user->addRole('student');


         // Create new student record
         $student = Student::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'sur_name' => $request->sur_name,
            'registration_no' => $request->registration_no,
            'user_id' => $user->id,
        ]);

         // Create new student record
         StudentCourse::create([
            'student_id' => $student->id,
            'course_id' => $request->course_id,
        ]);



        return redirect()->route('academic.students')->with('success', 'Student registered successfully.');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }public function import()
    {
        return view('students.import_student');
        //
    }
    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            'course_id' => 'required',
        ]);
        $courseId = $request->input('course_id');
        Excel::import(new StudentsImport($courseId), $request->file('file'));

    return redirect()->route('academic.students')->with('success', 'Students Imported successfully.');
    }
}
