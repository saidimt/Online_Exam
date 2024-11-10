@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Fill in the details below to register instructors</h3>
                {{-- <p class="text-muted"></p> --}}
            </div>
            <a href="{{ route('registrar.instructors.import') }}" class="btn btn-primary">Import Instructors</a>
        </div>

        <div class="card bg-lightt mb-4">
            <div class="card-header">
                <h5 class="card-title">Instructor Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.instructors.store') }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                    @csrf

                    <div id="instructorsContainer">
                        <!-- Instructor Registration Fields -->
                        <div class="instructor-fields border rounded p-3 mb-4">
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
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" name="email[]" class="form-control" placeholder="Enter Email" required>
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
                        <button type="button" class="btn btn-secondary" id="addInstructorBtn">+ Add Another Instructor</button>
                        <button type="button" class="btn btn-danger" id="removeInstructorBtn" style="display: none;">- Remove Last Instructor</button>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-4">Register Instructors</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const instructorsContainer = document.getElementById("instructorsContainer");
            const addInstructorBtn = document.getElementById("addInstructorBtn");
            const removeInstructorBtn = document.getElementById("removeInstructorBtn");
            let instructorCount = 1;

            addInstructorBtn.addEventListener("click", () => {
                if (instructorCount < 10) {
                    instructorCount++;

                    const instructorFields = document.createElement("div");
                    instructorFields.classList.add("instructor-fields", "border", "rounded", "p-3", "mb-4");
                    instructorFields.innerHTML = `
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
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email[]" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="picture" class="form-label">Profile Picture</label>
                                <input type="file" name="picture[]" class="form-control" required>
                            </div>
                        </div>
                    `;
                    instructorsContainer.appendChild(instructorFields);
                    removeInstructorBtn.style.display = "block";
                }
            });

            removeInstructorBtn.addEventListener("click", () => {
                if (instructorCount > 1) {
                    instructorsContainer.lastElementChild.remove();
                    instructorCount--;

                    if (instructorCount === 1) {
                        removeInstructorBtn.style.display = "none";
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
                <h3 class="fw-light">Register Instructors for Courses</h3>
                <p class="text-muted">Fill in the details below to register instructors for the Basic Airport Operation Course or Flight Operations Course.</p>
            </div>
            <a href="{{ route('registrar.instructors.import') }}" class="btn btn-primary">import instructors</a>
        </div>

        <div class="card bg-lighth mb-4">
            <div class="card-header">
                <h5 class="card-title">Instructor Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.instructors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- instructor Full Name -->
                        <div class="col-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}" placeholder="Enter first name" >
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- instructor Full Name -->
                        <div class="col-6 mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{old('middle_name')}}" placeholder="Enter middle name" required>
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- instructor Full Name -->
                        <div class="col-6 mb-3">
                            <label for="sur_name" class="form-label">Surname</label>
                            <input type="text" name="sur_name" class="form-control @error('sur_name') is-invalid @enderror" value="{{old('sur_name')}}" placeholder="Enter sur name" required>
                            @error('sur_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Registration Number -->
                        <div class="col-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Enter Email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                    <button type="submit" class="btn btn-primary">Register instructor</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}
