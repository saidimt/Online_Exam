<?php

namespace App\Http\Controllers\Results;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestResultsController extends Controller
{
    // Constructor to enforce 'instructor' role
    public function __construct()
    {
        $this->middleware('role:instructor');
    }

    // Method to show the test results
    public function showResults()
    {
        // Logic to retrieve test results, you can fetch them from the database
        // For now, we are just returning a placeholder view
        return view('results.test');
    }
}




// <?php

// namespace App\Http\Controllers\Results;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class TestResultsController extends Controller
// {
//     //
// }
