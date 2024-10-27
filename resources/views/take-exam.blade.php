@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="row ">
        <div class="col-9 col-md-9">
    <h2>Basic Airport Operation - Exam</h2>
</div>
<div class="col-3 col-md-3 float-end float-right">

    <!-- Timer -->
    <div class="text-end mb-4">
        <button id="timer" class="btn btn-warning" style="font-weight: bold;"></button>
    </div>
</div>

</div>
    <form action="{{ route('exam.submit') }}" method="POST" id="submit-exam">
        @csrf

        @foreach($exam as $question)
        <div class="card mb-4">
            <div class="card-body">
                <h5>{{ $question->question }}</h5>

                <!-- Options A, B, C, D -->
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="A" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_a }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="B" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_b }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="C" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_c }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="D" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_d }}</label>
                </div>
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Exam</button>
    </form>
</div>

<script>
    // Duration in minutes, which can be passed from the backend if saved in database
    let totalMinutes = {{ $examDuration }}; // Pass the exam duration from the backend
    let totalTime = totalMinutes * 60; // Convert to seconds

    const timerElement = document.getElementById('timer');

    function updateTimer() {
        const minutes = Math.floor(totalTime / 60);
        const seconds = totalTime % 60;
        timerElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        totalTime--;

        if (totalTime < 0) {
            clearInterval(timerInterval);
            alert("Time's up! Submitting your exam.");
            document.getElementById('submit-exam').submit(); // Automatically submit the form
        }
    }

    const timerInterval = setInterval(updateTimer, 1000);
</script>

@endsection



{{-- 
@extends('layouts.main')

@section('content')

<!-- CSS to disable text selection -->
<style>
    /* Disable text selection */
    * {
        -webkit-user-select: none; /* Safari */
        -moz-user-select: none;    /* Firefox */
        -ms-user-select: none;     /* Internet Explorer/Edge */
        user-select: none;         /* Standard syntax */
    }
</style>

<div class="container">
    <h2>Basic Airport Operation - Exam</h2>

    <form action="{{ route('exam.submit') }}" method="POST">
        @csrf

        @foreach($exam as $question)
        <div class="card mb-4">
            <div class="card-body">
                <h5>{{ $question->question }}</h5>

                <!-- Options A, B, C, D -->
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="A" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_a }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="B" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_b }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="C" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_c }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $question->id }}]" value="D" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_d }}</label>
                </div>
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Exam</button>
    </form>
</div>

<!-- JavaScript to disable copy, cut, paste, and right-click actions -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Disable copy, cut, and paste
        document.body.addEventListener('copy', (e) => e.preventDefault());
        document.body.addEventListener('cut', (e) => e.preventDefault());
        document.body.addEventListener('paste', (e) => e.preventDefault());

        // Disable right-click
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        // Prevent keyboard shortcuts (e.g., Ctrl+C, Ctrl+V)
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && (e.key === 'c' || e.key === 'v' || e.key === 'x')) {
                e.preventDefault();
            }
        });
    });
</script>

@endsection --}}
