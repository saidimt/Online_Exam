<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class StudentController extends Controller
{
    /**
     * Show the student dashboard.
     */
    public function index()
    {
        return view('student_dashboard');
    }

    /**
     * Show the available exams for the student to take.
     */
    public function showAvailableExams()
    {
        $exams = Exam::all(); // Retrieve all available exams
        return view('student.exams', compact('exams'));
    }

    /**
     * Show the exam page where the student can take the exam.
     */
    public function takeExam($id)
    {
        $exam = Exam::findOrFail($id); // Retrieve the selected exam by ID
        return view('student.take-exam', compact('exam'));
    }

    /**
     * Submit the exam answers and calculate the result.
     */
    public function submitExam(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $studentAnswers = $request->input('answers');
        $score = 0;

        // Calculate the student's score
        foreach ($exam->questions as $question) {
            if (isset($studentAnswers[$question->id]) && $studentAnswers[$question->id] == $question->correct_answer) {
                $score++;
            }
        }

        $totalQuestions = $exam->questions->count();
        $percentage = ($score / $totalQuestions) * 100;

        return view('student.result', compact('exam', 'score', 'totalQuestions', 'percentage'));
    }
}
