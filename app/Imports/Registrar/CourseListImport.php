<?php

namespace App\Imports\Registrar;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\CourseList;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CourseListImport implements ToCollection, ToModel, WithHeadingRow
{
    /**
     * Handle collection of rows from the import file.
     *
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $errorMessages = [];  // Store error messages for invalid rows

        foreach ($collection as $row) {
            // Validate each row based on predefined rules
            $validator = Validator::make($row->toArray(), [
                'course_code' => 'required|string|max:10|unique:course_lists,course_code', 
                'course_name' => 'required|string|max:50',
                'course_duration' => 'required|string|max:20',
            ]);

            if ($validator->fails()) {
                // Collect errors for failed validation and continue with the next row
                $errorMessages[] = "Invalid data in row: " . implode(', ', $validator->errors()->all());
                continue;
            }

            // If validation passes, create the new course entry
            CourseList::create([
                'course_code' => $row['course_code'],
                'course_name' => $row['course_name'],
                'course_duration' => $row['course_duration'],
                'user_id' => auth()->user()->id,
            ]);
        }

        // Check if there were any errors and display an alert message
        if (count($errorMessages) > 0) {
            // You can use session flash to display the errors to the user
            Session::flash('error_messages', $errorMessages);
        }
    }

    /**
     * Convert row to model instance.
     *
     * @param array $row
     * @return CourseList
     */
    public function model(array $row)
    {
        return new CourseList([
            'course_code' => $row['course_code'],
            'course_name' => $row['course_name'],
            'course_duration' => $row['course_duration'],
            'user_id' => auth()->user()->id,
        ]);
    }
}
