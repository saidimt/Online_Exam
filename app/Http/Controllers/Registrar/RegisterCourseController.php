<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Course;
use App\Models\CourseList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterCourseController extends Controller
{
    //
    public function index()
    {
        return view('registrar.course-lists.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCourseList()
    {
        return view('registrar.course-lists.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCourseList(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:50',
            'course_code' => 'required|string|max:10|unique:course_lists,course_code',
            'course_duration' => 'required|max:20',
        ]);
        $request['user_id']=auth()->user()->id;
        CourseList::create($request->all());
        Alert::success('Course List','Course registered successfully.');
        // Alert::toast('Course list registered successfully.', 'success');
        return redirect()->route('registrar.course-list.index');
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function allCourses()
    {
        return view('registrar.courses.index');
        //
    }
    public function createCourse()
    {
        $course_lists = CourseList::all();
        return view('registrar.courses.create',compact('course_lists'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCourse(Request $request)
    {
        $request->validate([
            'course_list_id' => 'required||exists:course_lists,id',
            'course_number' => 'required|string|max:10|unique:course_lists,course_code',
            'course_start_date' => 'required|date',
            'course_end_date' => 'required|date|after:course_start_date',
        ]);
        $request['user_id']=auth()->user()->id;
        Course::create($request->all());
        Alert::success('Course ','Course registered successfully.');
        // Alert::toast('Course list registered successfully.', 'success');
        return redirect()->route('registrar.course.index');
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
        return view('registrar.students.import_student');
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


