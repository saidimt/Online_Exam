@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center">Create Quiz</h2>

        <form action="{{ route('exam.store') }}" method="POST">
            @csrf

            <!-- Course Selection -->
            <div class="mb-4">
                <label for="course" class="form-label fw-bold">Course:</label>
                <select name="course_id" class="form-select" required>
                    <option value="" disabled selected>Select a Course</option>
                    {{-- @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Subject Selection -->
            <div class="mb-4">
                <label for="subject" class="form-label fw-bold">Subject:</label>
                <select name="subject_id" class="form-select" required>
                    <option value="" disabled selected>Select a Subject</option>
                    {{-- @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <!-- Exam Duration -->
            <div class="mb-4">
                <label for="exam-duration" class="form-label fw-bold">Exam Duration:</label>
                <select name="exam_duration" class="form-select" required>
                    <option value="30">30 Minutes</option>
                    <option value="45">45 Minutes</option>
                    <option value="60">1 Hour</option>
                    <option value="90">1 Hour 30 Minutes</option>
                    <option value="120">2 Hours</option>
                </select>
            </div>

            <!-- Number of Questions Selection -->
            <div class="mb-4">
                <label for="number_of_questions" class="form-label fw-bold">Number of Questions:</label>
                <select id="number_of_questions" class="form-select" required>
                    <option value="10">10 Questions</option>
                    <option value="20">20 Questions</option>
                    <option value="30">30 Questions</option>
                    <option value="40">40 Questions</option>
                    <option value="50">50 Questions</option>
                </select>
            </div>

            <!-- Questions Section -->
            <div id="questions-container">
                <!-- JavaScript will populate questions here -->
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary w-50">Submit Quiz</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questionsContainer = document.getElementById('questions-container');
        const numberOfQuestionsSelect = document.getElementById('number_of_questions');

        // Function to generate question fields
        function generateQuestions(num) {
            questionsContainer.innerHTML = ''; // Clear existing questions

            for (let i = 1; i <= num; i++) {
                const questionBlock = document.createElement('div');
                questionBlock.classList.add('card', 'border-secondary', 'mb-4');
                questionBlock.innerHTML = `
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Question ${i}</h5>
                    </div>
                    <div class="card-body">
                        <!-- Question Text -->
                        <div class="mb-3">
                            <label for="question-${i}" class="form-label">Question:</label>
                            <input type="text" name="questions[${i}][question]" class="form-control" placeholder="Enter the question here" required>
                        </div>

                        <!-- Question Weight -->
                        <div class="mb-3">
                            <label for="weight-${i}" class="form-label">Weight:</label>
                            <input type="number" name="questions[${i}][weight]" class="form-control" min="1" placeholder="Enter weight for this question" required>
                        </div>

                        <!-- Options A, B, C, D -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="option-a-${i}">Option A:</label>
                                <input type="text" name="questions[${i}][option_a]" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="option-b-${i}">Option B:</label>
                                <input type="text" name="questions[${i}][option_b]" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="option-c-${i}">Option C:</label>
                                <input type="text" name="questions[${i}][option_c]" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="option-d-${i}">Option D:</label>
                                <input type="text" name="questions[${i}][option_d]" class="form-control" required>
                            </div>
                        </div>

                        <!-- Correct Answer -->
                        <div class="mb-3">
                            <label for="correct-answer-${i}">Correct Answer:</label>
                            <select name="questions[${i}][correct_answer]" class="form-select" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                `;
                questionsContainer.appendChild(questionBlock);
            }
        }

        // Generate initial set of questions
        generateQuestions(numberOfQuestionsSelect.value);

        // Regenerate questions when number is changed
        numberOfQuestionsSelect.addEventListener('change', function() {
            generateQuestions(this.value);
        });
    });
</script>

@endsection




{{--

@extends('layouts.main')

@section('content')

<div class="container">
    <h2>Create Quiz: Basic Airport Operation</h2>

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

@endsection --}}
