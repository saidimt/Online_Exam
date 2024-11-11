@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Fill in the details below to register instructors</h3>
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
                                    <small class="text-danger d-none error-message">Please enter a valid first name.</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="middle_name" class="form-label">Middle Name:</label>
                                    <input type="text" name="middle_name[]" class="form-control" placeholder="Enter middle name" required>
                                    <small class="text-danger d-none error-message">Please enter a valid middle name.</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="sur_name" class="form-label">Surname:</label>
                                    <input type="text" name="sur_name[]" class="form-control" placeholder="Enter surname" required>
                                    <small class="text-danger d-none error-message">Please enter a valid surname.</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" name="email[]" class="form-control" placeholder="Enter Email" required>
                                    <small class="text-danger d-none error-message">Please enter a valid email address.</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="picture" class="form-label">Profile Picture:</label>
                                    <input type="file" name="picture[]" class="form-control" required>
                                    <small class="text-danger d-none error-message">Please upload a valid picture file.</small>
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
                    <button type="submit" class="btn btn-primary mt-4" id="submitBtn">Register Instructors</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const instructorsContainer = document.getElementById("instructorsContainer");
            const addInstructorBtn = document.getElementById("addInstructorBtn");
            const removeInstructorBtn = document.getElementById("removeInstructorBtn");
            const submitBtn = document.getElementById("submitBtn");

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
                                <small class="text-danger d-none error-message">Please enter a valid first name.</small>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name[]" class="form-control" placeholder="Enter middle name" required>
                                <small class="text-danger d-none error-message">Please enter a valid middle name.</small>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="sur_name" class="form-label">Surname</label>
                                <input type="text" name="sur_name[]" class="form-control" placeholder="Enter surname" required>
                                <small class="text-danger d-none error-message">Please enter a valid surname.</small>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email[]" class="form-control" placeholder="Enter Email" required>
                                <small class="text-danger d-none error-message">Please enter a valid email address.</small>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="picture" class="form-label">Profile Picture</label>
                                <input type="file" name="picture[]" class="form-control" required>
                                <small class="text-danger d-none error-message">Please upload a valid picture file.</small>
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

            submitBtn.addEventListener("click", function(event) {
                event.preventDefault();
                const allFields = document.querySelectorAll('.instructor-fields');
                let isValid = true;

                allFields.forEach((fields) => {
                    const inputs = fields.querySelectorAll('input');
                    inputs.forEach((input) => {
                        const error = input.nextElementSibling;
                        if (input.name === 'email[]') {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(input.value)) {
                                error.classList.remove('d-none');
                                isValid = false;
                            } else {
                                error.classList.add('d-none');
                            }
                        } else if (input.name === 'picture[]') {
                            if (input.files.length === 0) {
                                error.classList.remove('d-none');
                                isValid = false;
                            } else {
                                error.classList.add('d-none');
                            }
                        } else if (input.value.trim() === '') {
                            error.classList.remove('d-none');
                            isValid = false;
                        } else {
                            error.classList.add('d-none');
                        }
                    });
                });

                if (isValid) {
                    document.getElementById("registrationForm").submit();
                }
            });
        });
    </script>
@endsection
