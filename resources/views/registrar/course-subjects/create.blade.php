@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Register  Subjects</h3>
                <p class="text-muted">Fill in the details below to register subject.</p>
            </div>
            <a href="{{ route('registrar.course-subject.import') }}" class="btn btn-primary">import subjects</a>

        </div>
        <div class="card bg-lighth mb-4">
            <div class="card-header">
                <h5 class="card-title">Subject Course Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.course-subject.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                  <!-- Course Name -->
                  <div class="col-6 mb-3">
                        <label for="course_id" class="form-label">Course Name</label>
                        <select name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Select a course</option>
                            @foreach ($courses as $course)
                            <option value="{{$course->id}}" {{old('course_id')==$course->id?'selected':''}}>{{$course->CourseList->course_name. ' ('.$course->courseList->course_code.' '.$course->course_number.')'}}</option>
                            @endforeach
                            @error('course_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </select>
                    </div>
                    <!-- Subject Name -->
                    <div class="col-6 mb-3">
                        <label for="subject_id" class="form-label">Subject Name</label>
                        <select name="subject_id" class="form-select @error('subject_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Select a subject</option>
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}" {{old('subject_id')==$subject->id?'selected':''}}>{{$subject->subject_name. ' ('.$subject->subject_code.')'}}</option>
                            @endforeach
                             @error('subject_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </select>
                    </div>
                    
                     

                </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
