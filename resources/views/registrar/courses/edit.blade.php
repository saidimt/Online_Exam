@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>Edit Course</h2>

        <!-- Display any validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display success or error messages -->
        @if (session('error_messages'))
            <div class="alert alert-danger">
                <ul>
                    @foreach(session('error_messages') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registrar.course.update', $course->id) }}" method="POST">
            @csrf

            <!-- Course Code -->
            <div class="row course-field mb-3">
                            <div class="col-6">
                                <label for="course_list_id" class="form-label">Course Name</label>
                                <select name="course_list_id" class="form-select" required>
                                    <option value="" disabled selected>Select a course</option>
                                    @foreach ($course_lists as $course_list)
                                        <option value="{{ $course_list->id }}" {{old('course_list_id',$course->course_list_id)==$course_list->id ?'selected':''}} >{{ $course_list->course_name . ' (' . $course_list->course_code . ')' }}</option>
                                    @endforeach
                                    @error('course_list_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="course_number" class="form-label">Course Number</label>
                                <input type="text" name="course_number" class="form-control" value="{{old('course_number',$course->course_number)}}" placeholder="Enter Course Number" required>
                                @error('course_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                        </div>
                        <div class="row course-field mb-3">
                            <div class="col-6">
                                <label for="course_start_date" class="form-label">Course Start Date</label>
                                <input type="date" name="course_start_date" class="form-control" value="{{old('course_start_date',$course->course_start_date)}}" required>
                                @error('course_start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            <div class="col-6">
                                <label for="course_end_date" class="form-label">Course End Date</label>
                                <input type="date" name="course_end_date" value="{{old('course_end_date',$course->course_end_date)}}" class="form-control" required>
                                @error('course_end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                            </div>
                        </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
@endsection
