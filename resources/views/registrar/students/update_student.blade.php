@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Fill in the details below to register students based on Course</h3>
            </div>
            <a href="{{ route('registrar.students.import') }}" class="btn btn-primary">Import Students</a>
        </div>

        <div class="card bg-lightt mb-4">
            <div class="card-header">
                <h5 class="card-title">Student Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.students.store') }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                    @csrf

                    <div id="studentsContainer">
                        <!-- Student Registration Fields -->
                        <div class="student-fields border rounded p-3 mb-4">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="first_name" class="form-label">First Name:</label>
                                    <input type="text" name="first_name[]" class="form-control" placeholder="Enter first name" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="middle_name" class="form-label">Middle Name:</label>
                                    <input type="text" name="middle_name[]" class="form-control" placeholder="Enter middle name" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="sur_name" class="form-label">SurName:</label>
                                    <input type="text" name="sur_name[]" class="form-control" placeholder="Enter surname" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="registration_no" class="form-label">Registration No:</label>
                                    <input type="text" name="registration_no[]" class="form-control" placeholder="Enter registration number" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="course_id" class="form-label">Course Name:</label>
                                    <select name="course_id[]" class="form-select" required>
                                        <option value="" disabled selected>Select a course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->CourseList->course_name }} ({{ $course->CourseList->course_code }} {{ $course->course_number }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="picture" class="form-label">Profile Picture:</label>
                                    <input type="file" name="picture[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add/Remove Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" id="addStudentBtn">+ Add Another Student</button>
                        <button type="button" class="btn btn-danger" id="removeStudentBtn" style="display: none;">- Remove Last Student</button>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-4">Register Students</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const studentsContainer = document.getElementById("studentsContainer");
            const addStudentBtn = document.getElementById("addStudentBtn");
            const removeStudentBtn = document.getElementById("removeStudentBtn");
            let studentCount = 1;

            addStudentBtn.addEventListener("click", () => {
                if (studentCount < 10) {
                    studentCount++;

                    const studentFields = document.createElement("div");
                    studentFields.classList.add("student-fields", "border", "rounded", "p-3", "mb-4");
                    studentFields.innerHTML = `
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name[]" class="form-control" placeholder="Enter first name" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name[]" class="form-control" placeholder="Enter middle name" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="sur_name" class="form-label">Surname</label>
                                <input type="text" name="sur_name[]" class="form-control" placeholder="Enter surname" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="registration_no" class="form-label">Registration No</label>
                                <input type="text" name="registration_no[]" class="form-control" placeholder="Enter registration number" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="course_id" class="form-label">Course Name</label>
                                <select name="course_id[]" class="form-select" required>
                                    <option value="" disabled selected>Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->CourseList->course_name }} ({{ $course->CourseList->course_code }} {{ $course->course_number }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="picture" class="form-label">Profile Picture</label>
                                <input type="file" name="picture[]" class="form-control" required>
                            </div>
                        </div>
                    `;
                    studentsContainer.appendChild(studentFields);
                    removeStudentBtn.style.display = "block";
                }
            });

            removeStudentBtn.addEventListener("click", () => {
                if (studentCount > 1) {
                    studentsContainer.lastElementChild.remove();
                    studentCount--;

                    if (studentCount === 1) {
                        removeStudentBtn.style.display = "none";
                    }
                }
            });
        });
    </script>
@endsection


{{--
@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Register Students for Courses</h3>
                <p class="text-muted">Fill in the details below to register students for the Basic Airport Operation Course or Flight Operations Course.</p>
            </div>
            <a href="{{ route('registrar.students.import') }}" class="btn btn-primary">import Students</a>

        </div>
        <div class="card bg-lighth mb-4">
            <div class="card-header">
                <h5 class="card-title">Student Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <!-- Student Full Name -->
                    <div class="col-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"  value="{{old('first_name')}}" placeholder="Enter first name" >
                         @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Student Full Name -->
                    <div class="col-6 mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror"  value="{{old('middle_name')}}"  placeholder="Enter middle name" required>
                         @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                       <!-- Student Full Name -->
                       <div class="col-6 mb-3">
                        <label for="sur_name" class="form-label">Surname</label>
                        <input type="text" name="sur_name" class="form-control @error('sur_name') is-invalid @enderror"  value="{{old('sur_name')}}" placeholder="Enter sur name" required>
                         @error('sur_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Registration Number -->
                    <div class="col-6 mb-3">
                        <label for="registration_no" class="form-label">Registration No</label>
                        <input type="text" name="registration_no" class="form-control @error('registration_no') is-invalid @enderror" value="{{old('registration_no')}}"  placeholder="Enter registration number" required>
                         @error('registration_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

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

                    <!-- Profile Picture Upload -->
                    <div class="col-6 mb-3">
                        <label for="picture" class="form-label">Profile Picture</label>
                        <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" required>
                         @error('picture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Register Student</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}
