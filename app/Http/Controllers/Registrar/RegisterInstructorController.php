<?php

namespace App\Http\Controllers\Registrar;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterInstructorController extends Controller
{
    public function index()
    {
        return view('registrar.instructors.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function registerInstructor()
    {
        return view('registrar.instructors.register_instructor');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:instructors,email',
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
            'username' => $request->email,
            'password' => bcrypt($request->sur_name),
            'picture' => $profilePicturePath,
        ]);
            $user->addRole('instructor');
            $request['user_id'] =$user->id;
            $request['created_by'] =auth()->user()->id;
         // Create new student record
            Instructor::create( $request->all());



            Alert::success('Course ','Instructor registered successfully.');
            // Alert::toast('Course list registered successfully.', 'success');
            return redirect()->route('registrar.instructors');
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
        return view('registrar.instructors.import_student');
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
