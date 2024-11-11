@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-light">Fill in the details below to register courses.</h3>
        </div>
        <a href="{{ route('registrar.course-list.import') }}" class="btn btn-primary">Import Courses</a>
    </div>

    <div class="card bg-lightt mb-4">
        <div class="card-header">
            <h5 class="card-title">Course Registration Form</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('registrar.course-list.store') }}" method="POST" enctype="multipart/form-data" id="courseForm">
                @csrf
                <div id="coursesContainer">
                    <!-- Loop through old values if they exist to repopulate the form -->
                    @if(is_array(old('course_name')))
                        @foreach(old('course_name') as $index => $oldCourseName)
                            <div class="course-fields border rounded p-3 mb-4">
                                <div class="row">
                                    <!-- Course Name -->
                                    <div class="col-6 mb-3">
                                        <label for="course_name" class="form-label">Course Name:</label>
                                        <input type="text" name="course_name[]" class="form-control @error('course_name.' . $index) is-invalid @enderror" value="{{ old('course_name.' . $index) }}" placeholder="Enter Course Name" required>
                                        @error('course_name.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Course Code -->
                                    <div class="col-6 mb-3">
                                        <label for="course_code" class="form-label">Course Code:</label>
                                        <input type="text" name="course_code[]" class="form-control @error('course_code.' . $index) is-invalid @enderror" value="{{ old('course_code.' . $index) }}" placeholder="Enter Course Code" required>
                                        @error('course_code.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Course Duration -->
                                    <div class="col-6 mb-3">
                                        <label for="course_duration" class="form-label">Duration:</label>
                                        <input type="text" name="course_duration[]" class="form-control @error('course_duration.' . $index) is-invalid @enderror" value="{{ old('course_duration.' . $index) }}" placeholder="Enter Course Duration" required>
                                        @error('course_duration.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default form fields if there are no old values -->
                        <div class="course-fields border rounded p-3 mb-4">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="course_name" class="form-label">Course Name</label>
                                    <input type="text" name="course_name[]" class="form-control" placeholder="Enter Course Name" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="course_code" class="form-label">Course Code</label>
                                    <input type="text" name="course_code[]" class="form-control" placeholder="Enter Course Code" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="course_duration" class="form-label">Duration</label>
                                    <input type="text" name="course_duration[]" class="form-control" placeholder="Enter Course Duration" required>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Add/Remove Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" id="addCourseBtn">+ Add Another Course</button>
                    <button type="button" class="btn btn-danger" id="removeCourseBtn" style="display: none;">- Remove Last Course</button>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const coursesContainer = document.getElementById("coursesContainer");
        const addCourseBtn = document.getElementById("addCourseBtn");
        const removeCourseBtn = document.getElementById("removeCourseBtn");
        let courseCount = {{ count(old('course_name', [1])) }}; // Start with old values count or 1

        addCourseBtn.addEventListener("click", () => {
            if (courseCount < 10) {
                courseCount++;

                const courseFields = document.createElement("div");
                courseFields.classList.add("course-fields", "border", "rounded", "p-3", "mb-4");
                courseFields.innerHTML = `
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="course_name" class="form-label">Course Name</label>
                            <input type="text" name="course_name[]" class="form-control" placeholder="Enter Course Name" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="course_code" class="form-label">Course Code</label>
                            <input type="text" name="course_code[]" class="form-control" placeholder="Enter Course Code" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="course_duration" class="form-label">Duration</label>
                            <input type="text" name="course_duration[]" class="form-control" placeholder="Enter Course Duration" required>
                        </div>
                    </div>
                `;
                coursesContainer.appendChild(courseFields);
                removeCourseBtn.style.display = "block";
            }
        });

        removeCourseBtn.addEventListener("click", () => {
            if (courseCount > 1) {
                coursesContainer.lastElementChild.remove();
                courseCount--;

                if (courseCount === 1) {
                    removeCourseBtn.style.display = "none";
                }
            }
        });
    });
</script>
@endsection
