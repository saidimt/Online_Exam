@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Register  Courses</h3>
                <p class="text-muted">Fill in the details below to register course intake.</p>
            </div>
            <a href="{{ route('registrar.course.import') }}" class="btn btn-primary">import courses</a>

        </div>
        <div class="card bg-lighth mb-4">
            <div class="card-header">
                <h5 class="card-title">Course  Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <!-- Course Name -->
                    <div class="col-6 mb-3">
                        <label for="course_list_id" class="form-label">Course Name</label>
                        <select name="course_list_id" class="form-select @error('course_list_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Select a course</option>
                            @foreach ($course_lists as $course_list)
                            <option value="{{$course_list->id}}" {{old('course_list_id')==$course_list->id?'selected':''}}>{{$course_list->course_name. ' ('.$course_list->course_code.' )'}}</option>
                            @endforeach
                            @error('course_list_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </select>
                    </div>
                    <!-- Course Code -->
                    <div class="col-6 mb-3">
                        <label for="course_number" class="form-label">Course Number</label>
                        <input type="text" name="course_number" class="form-control @error('course_number') is-invalid @enderror"  value="{{old('course_number')}}"  placeholder="Enter Course Number" required>
                         @error('course_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                       <!-- Course Duration -->
                       <div class="col-6 mb-3">
                        <label for="course_start_date" class="form-label">Course Start date</label>
                        <input type="date" name="course_start_date" class="form-control @error('course_start_date') is-invalid @enderror"  value="{{old('course_start_date')}}" required>
                         @error('course_start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Course Duration -->
                    <div class="col-6 mb-3">
                        <label for="course_end_date" class="form-label">Course End Date</label>
                        <input type="date" name="course_end_date" class="form-control @error('course_end_date') is-invalid @enderror"  value="{{old('course_end_date')}}"  required>
                         @error('course_end_date')
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
