<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Course;
use App\Models\Subject;
use App\Models\SubjectList;
use Illuminate\Http\Request;
use App\Models\SubjectCourse;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Excel;
use App\Imports\Registrar\SubjectImport;

class RegisterSubjectController extends Controller
{
    protected $excel; public function __construct(Excel $excel) { $this->excel = $excel; }
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
        $validatedData = $request->validate([
            'subject_name.*' => 'required|string|min:5|max:255',
            'subject_code.*' => 'required|string|max:20',
        ], [
            'subject_name.*.required' => 'Subject name is required.',
            'subject_name.*.min' => 'Subject name must be at least 5 characters.',
            'subject_code.*.required' => 'Subject code is required.',
        ]);
        $user_id=auth()->user()->id;
        foreach ($request->subject_name as $index => $subjectName) {

        Subject::create([
            'subject_name'=>$request->subject_name[$index],
            'subject_code'=>$request->subject_code[$index],
            'user_id'=>$user_id,
        ]);
        }
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
   /**
 * Show the form for editing the specified resource.
 */
public function editSubject(string $id)
{
    // Find the subject by its ID
    $subject = Subject::find($id);

    // If the subject doesn't exist, redirect back with an error
    if (!$subject) {
        Alert::error('Subject Not Found', 'The subject you are trying to edit does not exist.');
        return redirect()->route('registrar.subject.index');
    }

    // Pass the subject to the edit view
    return view('registrar.subjects.edit', compact('subject'));
}


    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function updateSubject(Request $request, string $id)
{
    // Validate the updated data
    $request->validate([
        'subject_name' => 'required|max:50',
        'subject_code' => 'required|string|max:10|unique:subjects,subject_code,' . $id, // Ignore the unique check for the current subject
    ]);

    // Find the subject by ID
    $subject = Subject::find($id);

    // If the subject doesn't exist, redirect back with an error
    if (!$subject) {
        Alert::error('Subject Not Found', 'The subject you are trying to update does not exist.');
        return redirect()->route('registrar.subject.index');
    }

    // Update the subject details
    $subject->update($request->all());

    // Success message
    Alert::success('Subject Updated', 'Subject updated successfully.');
    return redirect()->route('registrar.subject.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function deleteSubject(string $id)
{
    $subject = Subject::find($id);

    if (!$subject) {
        Alert::error('Subject Not Found', 'The subject you are trying to delete does not exist.');
        return redirect()->route('registrar.subject.index');
    }

    $subject->delete();
    Alert::success('Subject Deleted', 'Subject deleted successfully.');
    return redirect()->route('registrar.subject.index');
}

    public function import()
    {
        return view('registrar.subjects.import_Subject');
        //
    }
    public function importSubject(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $this->excel->import(new SubjectImport, $request->file('file'));

        try {
            // Process the import
            $import = new SubjectImport();
            $this->excel->import($import, $request->file('file'));
    
            // Check if there are any errors
            if ($import->getErrors()) {
                return back()->with('import_errors', $import->getErrors());
            }
    
            return redirect()->route('registrar.subject.index')->with('success', 'Subjects imported successfully!');
        } catch (\Exception $e) {
            return back()->with('import_errors', ['An unexpected error occurred: ' . $e->getMessage()]);
        }
    }
}


