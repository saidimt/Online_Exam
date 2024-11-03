<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Course;
use App\Models\Subject;
use App\Models\SubjectList;
use Illuminate\Http\Request;
use App\Models\SubjectCourse;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterSubjectController extends Controller
{
    //
    public function index()
    {
        return view('registrar.subjects.index');
        //
    }
  /**
     * Show the form for creating a new resource.
     */
    public function allCourses()
    {
        return view('registrar.course-subjects.index');
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createCourseSubject()
    {
        $subjects=Subject::all();
        $courses=Course::all();
        return view('registrar.course-subjects.create',compact('courses','subjects'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCourseSubject(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'course_id' => 'required|string|exists:courses,id',//Rule Tocheck existence of Pair
        ]);
        $request['user_id']=auth()->user()->id;
        SubjectCourse::create($request->all());
        Alert::success('Subject List','Subject registered successfully.');
        // Alert::toast('Subject list registered successfully.', 'success');
        return redirect()->route('registrar.course-subject.index');
        //
    }
  
    public function createSubject()
    {
        return view('registrar.subjects.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSubject(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|max:50',
            'subject_code' => 'required|string|max:10|unique:subjects,subject_code',
        ]);
        $request['user_id']=auth()->user()->id;
        Subject::create($request->all());
        Alert::success('Subject ','Subject registered successfully.');
        return redirect()->route('registrar.subject.index');
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
    }
    public function import()
    {
        return view('registrar.students.import_student');
        //
    }
    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            'subject_id' => 'required',
        ]);
        $subjectId = $request->input('subject_id');
        Excel::import(new StudentsImport($subjectId), $request->file('file'));

    return redirect()->route('academic.students')->with('success', 'Students Imported successfully.');
    }
}


