<?php 
namespace App\Imports\Registrar;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectImport implements ToCollection
{
    protected $errors = [];

    public function collection(Collection $rows)
    {
        // Check if the first row contains valid headers
        $this->validateHeaders($rows->first());

        if (!empty($this->errors)) {
            return;
        }

        // Process each row after the header
        foreach ($rows->skip(1) as $index => $row) {
            $data = [
                'subject_name' => $row[0] ?? null,
                'subject_code' => $row[1] ?? null,
            ];

            // Validate the row data
            $validator = Validator::make($data, [
                'subject_name' => 'required|string|max:50',
                'subject_code' => 'required|string|max:10|unique:subjects,subject_code',
            ]);

            // Log any validation errors
            if ($validator->fails()) {
                $this->errors[] = "Row " . ($index + 2) . ": " . implode(', ', $validator->errors()->all());
                continue;
            }

            // Save the subject if validation passes
            Subject::create([
                'subject_name' => $data['subject_name'],
                'subject_code' => $data['subject_code'],
            'user_id' => auth()->user()->id,
            ]);
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function validateHeaders($header)
    {
        if ($header[0] !== 'subject_name' || $header[1] !== 'subject_code') {
            $this->errors[] = 'The file must contain "Subject Name" and "Subject Code" as the first columns.';
        }
    }
}

       