<?php

// namespace App\Http\Controllers;

// use App\Models\SubjectCourse;
// use Illuminate\Http\Request;
// use App\Models\Exam;
// use App\Models\Course;
// use App\Models\Subject;

// class ExamController extends Controller
// {
//     // Show form to the instructor to create the exam
//     public function create() {
//         // Fetch courses and subjects from the database to pass to the view
//         $courses = Course::all();
//         $subjects = SubjectCourse::all(); // Adjust this as needed to filter subjects based on course selection
//         return view('instructor.create-exam', compact('courses', 'subjects'));
//     }

//     public function create_test() {
//         return view('instructor.create-test');
//     }

//     public function create_quizy() {
//         return view('instructor.create-quizy');
//     }

//     // Store the exam questions in the database
//     public function store(Request $request) {
//         $validated = $request->validate([
//             'exam_name' => 'required|string',
//             'questions.*.question' => 'required|string',
//             'questions.*.option_a' => 'required|string',
//             'questions.*.option_b' => 'required|string',
//             'questions.*.option_c' => 'required|string',
//             'questions.*.option_d' => 'required|string',
//             'questions.*.correct_answer' => 'required|in:A,B,C,D',
//         ]);

//         // Save exam and questions
//         foreach ($validated['questions'] as $question) {
//             Exam::create([
//                 'exam_name' => $validated['exam_name'],
//                 'question' => $question['question'],
//                 'option_a' => $question['option_a'],
//                 'option_b' => $question['option_b'],
//                 'option_c' => $question['option_c'],
//                 'option_d' => $question['option_d'],
//                 'correct_answer' => $question['correct_answer'],
//             ]);
//         }

//         return redirect()->route('welcome')->with('success', 'Exam created successfully.');
//     }

//     public function studentResult() {
//         return view('exam-result', compact('studentAnswers', 'questions', 'score', 'totalQuestions', 'percentage'));
//     }

//     // Show the exam to the student
//     public function studentExam() {
//         $examDuration = 60; // Set your desired default duration here, e.g., 60 minutes
//         $exam = Exam::all(); // Retrieve all exam questions
//         return view('take-exam', compact('exam', 'examDuration'));
//     }

//     // Method to submit the exam and show results
//     public function submitExam(Request $request) {
//         $studentAnswers = $request->input('answers');
//         $questions = Exam::all();
//         $score = 0;
//         $totalQuestions = $questions->count();

//         // Calculate score
//         foreach ($questions as $question) {
//             if (isset($studentAnswers[$question->id]) && $studentAnswers[$question->id] === $question->correct_answer) {
//                 $score++;
//             }
//         }

//         $percentage = ($score / $totalQuestions) * 100;

//         // Pass the data to the results view
//         return view('exam-result', compact('studentAnswers', 'questions', 'score', 'totalQuestions', 'percentage'));
//     }




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    // Show form to the instructor to create the exam
    public function create() {
        return view('instructor.create-exam');
    }


    public function create_test () {
        return view('instructor.create-test');
    }
    public function create_quiz () {
        return view('instructor.create-quiz');
    }
    // Store the exam questions in the database
    public function store(Request $request) {
        $validated = $request->validate([
            'exam_name' => 'required|string',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);

        // Save exam and questions
        foreach ($validated['questions'] as $question) {
            Exam::create([
                'exam_name' => $validated['exam_name'],
                'question' => $question['question'],
                'option_a' => $question['option_a'],
                'option_b' => $question['option_b'],
                'option_c' => $question['option_c'],
                'option_d' => $question['option_d'],
                'correct_answer' => $question['correct_answer'],
            ]);
        }

        return redirect()->route('welcome')->with('success', 'Exam created successfully.');
        // return redirect()->route('exam.result')->with('success', 'Exam created successfully.');
    }
    public function studentResult() {  return view('exam-result', compact('studentAnswers', 'questions', 'score', 'totalQuestions', 'percentage'));
}
    // Show the exam to the student
    public function studentExam() {
        $examDuration=01;
        $exam = Exam::all(); // Retrieve all exam questions
        return view('take-exam', compact('exam','examDuration'));
    }
       // Method to submit the exam and show results
       public function submitExam(Request $request) {
        $studentAnswers = $request->input('answers');
        $questions = Exam::all();
        $score = 0;
        $totalQuestions = $questions->count();

        // Calculate score
        foreach ($questions as $question) {
            if (isset($studentAnswers[$question->id]) && $studentAnswers[$question->id] === $question->correct_answer) {
                $score++;
            }
        }

        $percentage = ($score / $totalQuestions) * 100;

        // Pass the data to the results view
        return view('exam-result', compact('studentAnswers', 'questions', 'score', 'totalQuestions', 'percentage'));
    }

}
