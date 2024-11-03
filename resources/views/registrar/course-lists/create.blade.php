@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Register  Courses</h3>
                <p class="text-muted">Fill in the details below to register course.</p>
            </div>
            <a href="{{ route('registrar.course.import') }}" class="btn btn-primary">import courses</a>

        </div>
        <div class="card bg-lighth mb-4">
            <div class="card-header">
                <h5 class="card-title">Course List Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.course-list.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <!-- Course Name -->
                    <div class="col-6 mb-3">
                        <label for="course_name" class="form-label">Course Name</label>
                        <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror"  value="{{old('course_name')}}"  minlength="5" placeholder="Enter Course Name" required>
                         @error('course_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Course Code -->
                    <div class="col-6 mb-3">
                        <label for="course_code" class="form-label">Course Code</label>
                        <input type="text" name="course_code" class="form-control @error('course_code') is-invalid @enderror"  value="{{old('course_code')}}"  placeholder="Enter Course Code" required>
                         @error('course_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                       <!-- Course Duration -->
                       <div class="col-6 mb-3">
                        <label for="course_duration" class="form-label">Duration</label>
                        <input type="text" name="course_duration" class="form-control @error('course_duration') is-invalid @enderror"  value="{{old('course_duration')}}" placeholder="Enter Course Duration" required>
                         @error('course_duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
