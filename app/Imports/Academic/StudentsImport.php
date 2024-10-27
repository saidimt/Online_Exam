<?php

namespace App\Imports\Academic;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\{Student,User,StudentCourse};
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
class StudentsImport implements ToCollection,ToModel, WithHeadingRow
{
    protected $course_id;
    public function __construct($course_id)
    {
        $this->course_id = $course_id;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
    public function model(array $row)
    {

        // return new Student([
        //     'first_name'      => $row['first_name'],
        //     'middle_name'     => $row['middle_name'],
        //     'surname'         => $row['surname'],
        //     'registration_no' => $row['registration_no'],
        //     'course_name'     => $row['course_name'],
        // ]);
        $profilePicturePath="pictures/userd.png";
     // Create new student record
     $user= User::create([
        'name' => $row['first_name'].' '.$row['middle_name'].' '.$row['surname'],
        'username' => $row['registration_no'],
        'password' => bcrypt($row['surname']),
        'picture' => $profilePicturePath,
    ]);
    $user->addRole('student');


     // Create new student record
     $student = Student::create([
        'first_name' => $row['first_name'],
        'middle_name' => $row['middle_name'],
        'sur_name' => $row['surname'],
        'registration_no' => $row['registration_no'],
        'user_id' => $user->id,
    ]);

     // Create new student record
     StudentCourse::create([
        'student_id' => $student->id,
        'course_id' => $this->course_id,
    ]);



    //
}
}
