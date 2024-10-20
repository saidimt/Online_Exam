@extends('layouts.main')

@section('content')

<div class="container">
    <h2>Exam Result: Basic Airport Operation</h2>

    <!-- Display the score -->
    <div class="alert alert-info">
        You scored <strong>{{ $score }}</strong> out of <strong>{{ $totalQuestions }}</strong> questions. <br>
        Your percentage: <strong>{{ number_format($percentage, 2) }}%</strong>
    </div>

    <!-- Show each question, correct answer, and student's answer -->
    <div class="card mb-4">
        <div class="card-body">
            @foreach ($questions as $question)
                <div class="mb-4">
                    <h5>{{ $question->question }}</h5>

                    <!-- Display the correct answer -->
                    <p><strong>Correct Answer:</strong> {{ $question->correct_answer }}</p>

                    <!-- Display the student's answer -->
                    <p><strong>Your Answer:</strong> 
                        @if (isset($studentAnswers[$question->id]))
                            {{ $studentAnswers[$question->id] }}
                            @if ($studentAnswers[$question->id] == $question->correct_answer)
                                <span class="text-success">(Correct)</span>
                            @else
                                <span class="text-danger">(Incorrect)</span>
                            @endif
                        @else
                            <span class="text-warning">No answer selected</span>
                        @endif
                    </p>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

    <!-- Link to retake or exit -->
    <div class="d-flex justify-content-between">
        <a href="{{ route('exam.student') }}" class="btn btn-primary">Retake Exam</a>
        <a href="/" class="btn btn-secondary">Exit</a>
    </div>
</div>

@endsection
