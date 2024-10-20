@extends('layouts.main')

@section('content')

<div class="container">
    <h2>Create Exam: Basic Airport Operation</h2>

    <form action="{{ route('exam.store') }}" method="POST">
        @csrf

        <!-- Exam Name -->
        <input type="hidden" name="exam_name" value="Basic Airport Operation">

        <!-- Loop for creating up to 50 questions -->
        @for ($i = 1; $i <= 2; $i++)
        <div class="card mb-4">
            <div class="card-body">
                <h5>Question {{ $i }}</h5>
                <div class="mb-3">
                    <label for="question-{{ $i }}" class="form-label">Question:</label>
                    <input type="text" name="questions[{{ $i }}][question]" class="form-control" placeholder="Enter the question here" required>
                </div>

                <!-- Options A, B, C, D -->
                <div class="mb-3">
                    <label for="option-a-{{ $i }}">Option A:</label>
                    <input type="text" name="questions[{{ $i }}][option_a]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="option-b-{{ $i }}">Option B:</label>
                    <input type="text" name="questions[{{ $i }}][option_b]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="option-c-{{ $i }}">Option C:</label>
                    <input type="text" name="questions[{{ $i }}][option_c]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="option-d-{{ $i }}">Option D:</label>
                    <input type="text" name="questions[{{ $i }}][option_d]" class="form-control" required>
                </div>

                <!-- Correct Answer -->
                <div class="mb-3">
                    <label for="correct-answer-{{ $i }}">Correct Answer:</label>
                    <select name="questions[{{ $i }}][correct_answer]" class="form-select" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
        </div>
        @endfor

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit Exam</button>
    </form>
</div>

@endsection
