@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Subject</h2>

        <!-- Display any errors or success messages -->
        @include('partials.alert')

        <form action="{{ route('registrar.subject.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" class="form-control" value="{{ old('subject_name', $subject->subject_name) }}" required>
            </div>

            <div class="form-group">
                <label for="subject_code">Subject Code</label>
                <input type="text" name="subject_code" class="form-control" value="{{ old('subject_code', $subject->subject_code) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Subject</button>
        </form>
    </div>
@endsection
