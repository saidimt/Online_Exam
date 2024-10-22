<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Show the dashboard for the instructor.
     */
    public function index()
    {
        return view('instructor.dashboard');
    }
}
