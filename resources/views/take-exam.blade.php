@extends('layouts.main')

@section('content')

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

@endsection
