<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Course;
use App\Models\CourseList;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use App\Imports\Registrar\CourseListImport;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterCourseController extends Controller
{
    protected $excel; public function __construct(Excel $excel) { $this->excel = $excel; }
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
        // Find the course by its ID
    $course = CourseList::find($id);

    // Check if the course exists
    if (!$course) {
        // If course is not found, redirect with an error message
        Alert::error('Course Not Found', 'The course you are trying to edit does not exist.');
        return redirect()->route('registrar.course.index');
    }

    // Validate incoming request data (you can define validation rules based on your needs)
    $request->validate([
        'course_code' => 'required|string|max:10|unique:course_lists,id,' . $id,
        'course_name' => 'required|string|max:50',
        'course_duration' => 'required|string|max:20',
    ]);

    // Update course fields from the request
    $course->course_code = $request->course_code;
    $course->course_name = $request->course_name;
    $course->course_duration = $request->course_duration;

    // Optionally, update the user who modified the course (for audit purposes)
    $course->user_id = auth()->user()->id;

    // Save the updated course data
    $course->save();

    // Display a success alert
    Alert::success('Course Updated', 'The course has been updated successfully.');

    // Redirect back to the course list or the appropriate page
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
    public function importCourseList()
    {
        return view('registrar.course-lists.import_Course');
        //
    }
    public function importCourseLists(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            // 'course_id' => 'required',
        ]);
        // $courseId = $request->input('course_id');
        $this->excel->import(new CourseListImport, $request->file('file'));

    return redirect()->route('registrar.course-list.index')->with('success', 'Courses Imported successfully.');
    }
    public function editCourse(string $id)
{
    // Find the course list by its ID
    $course = Course::find($id);
    $course_lists = CourseList::all();

    // Check if the course  exists
    if (!$course) {
        Alert::error('Course Not Found', 'The course  you are trying to edit does not exist.');
        return redirect()->route('registrar.course.index');
    }

    // If the course  exists, pass it to the view for editing
    return view('registrar.courses.edit', compact('course','course_lists'));
}
public function updateCourse(Request $request, string $id)
    {
        // Find the course by its ID
    $course = Course::find($id);

    // Check if the course exists
    if (!$course) {
        // If course is not found, redirect with an error message
        Alert::error('Course Not Found', 'The course you are trying to edit does not exist.');
        return redirect()->route('registrar.course.index');
    }

    // Validate incoming request data (you can define validation rules based on your needs)
    $request->validate([
        'course_list_id' => 'required||exists:course_lists,id',
        'course_number' => 'required|string|max:10|unique:course_lists,course_code',
        'course_start_date' => 'required|date',
        'course_end_date' => 'required|date|after:course_start_date',
    ]);

    // Update course fields from the request
    $course->course_list_id = $request->course_list_id;
    $course->course_number = $request->course_number;
    $course->course_start_date = $request->course_start_date;
    $course->course_end_date = $request->course_end_date;

    // Optionally, update the user who modified the course (for audit purposes)
    $course->user_id = auth()->user()->id;

    // Save the updated course data
    $course->save();

    // Display a success alert
    Alert::success('Course Updated', 'The course has been updated successfully.');

    // Redirect back to the course list or the appropriate page
        // Redirect to the course list index page
        return redirect()->route('registrar.course.index');
    }
    
}



