@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-light">Edit in the details below to update courses.</h3>
        </div>
        <a href="{{ route('registrar.course-list.index') }}" class="btn btn-primary">Courses</a>
    </div>

    <div class="card bg-lightt mb-4">
        <div class="card-header">
            <h5 class="card-title">Course Update Form</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('registrar.course-list.update',$course_list->id) }}" method="POST" enctype="multipart/form-data" id="courseForm">
                @csrf
                <div id="coursesContainer">
                    <!-- Loop through old values if they exist to repopulate the form -->
                            <div class="course-fields border rounded p-3 mb-4">
                                <div class="row">
                                    <!-- Course Name -->
                                    <div class="col-6 mb-3">
                                        <label for="course_name" class="form-label">Course Name:</label>
                                        <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{ old('course_name',$course_list->course_name) }}" placeholder="Enter Course Name" required>
                                        @error('course_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Course Code -->
                                    <div class="col-6 mb-3">
                                        <label for="course_code" class="form-label">Course Code:</label>
                                        <input type="text" name="course_code" class="form-control @error('course_code') is-invalid @enderror" value="{{ old('course_code',$course_list->course_code) }}" placeholder="Enter Course Code" required>
                                        @error('course_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Course Duration -->
                                    <div class="col-6 mb-3">
                                        <label for="course_duration" class="form-label">Duration:</label>
                                        <input type="text" name="course_duration" class="form-control @error('course_duration') is-invalid @enderror" value="{{ old('course_duration',$course_list->course_duration) }}" placeholder="Enter Course Duration" required>
                                        @error('course_duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                </div>

                <!-- Add/Remove Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-danger" id="removeCourseBtn" style="display: none;">- Remove Last Course</button>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
