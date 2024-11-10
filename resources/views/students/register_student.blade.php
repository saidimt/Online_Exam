@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Register Students for Courses</h3>
                <p class="text-muted">Fill in the details below to register students for the Basic Airport Operation Course or Flight Operations Course.</p>
            </div>
            <a href="{{ route('academic.students.import') }}" class="btn btn-primary">import Students</a>

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
                
                            <option value="1" {{old('course_id')=='1'?'selected':''}}>Basic Airport Operation Course</option>
                            <option value="2" {{old('course_id')=='2'?'selected':''}}>Flight Operations Course</option>
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
@endsection
