<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function instruction()
    {
        return view('instruction');
    }
    public function startExam()
    {
        return view('start-exam');
    }
    public function take_exam()
    {
        return view('instruction');
    }
    public function take_test()
    {
        return view('instruction');
    }
    public function take_quizy()
    {
        return view('instruction');
    }
}