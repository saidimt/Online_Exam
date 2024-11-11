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
        $instructors = Instructor::all(); // Fetch all instructors
        return view('registrar.instructors.index', compact('instructors'));
    }

    public function registerInstructor()
    {
        return view('registrar.instructors.register_instructor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name.*' => 'required|string|max:20',
            'email.*' => 'required|email|max:100|unique:instructors,email',
            'sur_name.*' => 'required|string|max:20',
            'middle_name.*' => 'required|string|max:20',
            'picture.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profilePicturePath = '';
        if ($request->hasFile('picture')) {
            foreach ($request->file('picture') as $index => $file) {
                $filePath = 'pictures';
                $fileName = str_replace('/', '_', $request->email[$index]) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($filePath), $fileName);
                $profilePicturePath = $filePath . '/' . $fileName;
            }
        }

        foreach ($request->first_name as $index => $firstName) {
            $user = User::create([
                'name' => $firstName . ' ' . $request->middle_name[$index] . ' ' . $request->sur_name[$index],
                'username' => $request->email[$index],
                'password' => bcrypt($request->sur_name[$index]),
                'picture' => $profilePicturePath,
            ]);

            $user->addRole('instructor');

            Instructor::create([
                'user_id' => $user->id,
                'created_by' => auth()->user()->id,
                'first_name' => $firstName,
                'middle_name' => $request->middle_name[$index],
                'sur_name' => $request->sur_name[$index],
                'email' => $request->email[$index],
                'picture' => $profilePicturePath,
            ]);
        }

        Alert::success('Instructor Registration', 'Instructor(s) registered successfully.');
        return redirect()->route('registrar.instructors');
    }

    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('registrar.instructors.edit_instructor', compact('instructor'));
    }

    // In your InstructorController
public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
    ]);

    // Find the instructor
    $instructor = Instructor::findOrFail($id);

    // Update basic information
    $instructor->first_name = $request->input('first_name');
    $instructor->last_name = $request->input('last_name');
    $instructor->email = $request->input('email');

    // Handle the profile picture upload if a file is uploaded
    if ($request->hasFile('profile_picture')) {
        // Delete old profile picture if exists
        if ($instructor->profile_picture && file_exists(storage_path('app/public/'.$instructor->profile_picture))) {
            unlink(storage_path('app/public/'.$instructor->profile_picture));
        }

        // Store the new profile picture
        $profilePicture = $request->file('profile_picture');
        $path = $profilePicture->store('profile_pictures', 'public');

        // Update the instructor's profile picture field
        $instructor->profile_picture = $path;
    }

    // Save the updated instructor record
    $instructor->save();

    // Redirect back to the instructor list or show page with a success message
    return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully');
}


    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $user = User::findOrFail($instructor->user_id);

        // Optionally delete the profile picture from the server
        if (file_exists(public_path($instructor->picture))) {
            unlink(public_path($instructor->picture));
        }

        $instructor->delete();
        $user->delete();

        Alert::success('Instructor Deleted', 'Instructor has been successfully deleted.');
        return redirect()->route('registrar.instructors');
    }

    public function import()
    {
        return view('registrar.instructors.import_instructor');
    }

    public function importInstructors(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // You would need to implement an import logic here (e.g., using a package like Maatwebsite Excel)

        Alert::success('Instructors Imported', 'Instructors have been imported successfully.');
        return redirect()->route('registrar.instructors');
    }
}


