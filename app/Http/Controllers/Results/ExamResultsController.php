<?php

namespace App\Http\Controllers\Results;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamResultsController extends Controller
{
    // Constructor to enforce 'instructor' role
    public function __construct()
    {
        $this->middleware('role:instructor');
    }

    // Method to show the exam results
    public function showResults()
    {
        // Logic to retrieve exam results, you can fetch them from the database
        // For now, we are just returning a placeholder view
        return view('results.exam');
    }
}





// <?php

// namespace App\Http\Controllers\Results;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class ExamResultsController extends Controller
// {
//     //
// }
