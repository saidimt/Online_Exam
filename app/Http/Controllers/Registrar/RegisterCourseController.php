<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Course;
use App\Models\CourseList;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use App\Imports\Academic\StudentsImport;
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
            // 'course_name' => 'required|string|max:50',
            // 'course_code' => 'required|string|max:10|unique:course_lists,course_code',
            // 'course_duration' => 'required|max:20',
            'course_code.*' => 'required|string|max:10|unique:course_lists,course_code',
            'course_name.*' => 'required|string|max:50',
            'course_duration.*' => 'required|max:20',
        ]);
        $emp_id=auth()->user()->id;

        foreach ($request['course_name'] as $key => $value)
        {


           $save = new Request();

           $save['course_name']=$request['course_name'][$key];
           $save['course_code']=$request['course_code'][$key];
           $save['course_duration']=$request['course_duration'][$key];
           $save['user_id']=$emp_id;
           CourseList::create($save->all());

        }

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
            'course_list_id.*' => 'required||exists:course_lists,id',
            'course_number.*' => 'required|string|max:10|unique:course_lists,course_code',
            'course_start_date.*' => 'required|date',
            'course_end_date.*' => 'required|date|after:course_start_date.*',
        ]);
        $emp_id=auth()->user()->id;

        foreach ($request['course_list_id'] as $key => $value)
        {
           $save = new Request();

           $save['course_list_id']=$request['course_list_id'][$key];
           $save['course_number']=$request['course_number'][$key];
           $save['course_start_date']=$request['course_start_date'][$key];
           $save['course_end_date']=$request['course_end_date'][$key];
           $save['user_id']=$emp_id;
           Course::create($save->all());
        }
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
    public function editCourseList(string $id)
{
    // Find the course list by its ID
    $course_list = CourseList::find($id);

    // Check if the course list exists
    if (!$course_list) {
        Alert::error('Course List Not Found', 'The course list you are trying to edit does not exist.');
        return redirect()->route('registrar.course-list.index');
    }

    // If the course list exists, pass it to the view for editing
    return view('registrar.course-lists.edit', compact('course_list'));
}


    /**
     * Update the specified resource in storage.
     */
    public function updateCourseList(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'course_name' => 'required|string|max:255',   // Course name validation
            'course_description' => 'nullable|string',    // Course description (optional)
            'course_duration' => 'nullable|string|min:1', // Course duration (optional, should be an integer)
            // Add other necessary fields you want to validate
        ]);

        // Find the course list item by its ID
        $course_list = CourseList::find($id);

        // Check if the course list exists
        if ($course_list) {
            // Update the course list details
            $course_list->update([
                'course_name' => $request->input('course_name'),
                'course_description' => $request->input('course_description'),
                'course_duration' => $request->input('course_duration'),
                // Include any other fields you want to update
            ]);

            // Success message
            Alert::success('Course List Updated', 'Course list updated successfully.');
        } else {
            // If course list not found, display error message
            Alert::error('Course List Not Found', 'The course list you are trying to update does not exist.');
        }

        // Redirect to the course list index page
        return redirect()->route('registrar.course-list.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteCourseList(string $id)
    {
        //

        $course_list=CourseList::find($id);
        $course_list->delete();
        Alert::success('Course ','Course deleted successfully.');
        // Alert::toast('Course list registered successfully.', 'success');
        return redirect()->route('registrar.course-list.index');
        //



        
    }
    public function deleteCourse(string $id)
    {
        //

        $course_list=Course::find($id);
        $course_list->delete();
        Alert::success('Course ','Course deleted successfully.');
        // Alert::toast('Course list registered successfully.', 'success');
        return redirect()->route('registrar.course.index');
        //

    }
    public function import()
    {
        return view('registrar.course-lists.import_Course');
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



