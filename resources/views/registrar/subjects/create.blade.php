@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Register  Subjects</h3>
                <p class="text-muted">Fill in the details below to register subject.</p>
            </div>
            <a href="{{ route('registrar.subject.import') }}" class="btn btn-primary">import subjects</a>

        </div>
        <div class="card bg-lighth mb-4">
            <div class="card-header">
                <h5 class="card-title">Subject List Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.subject.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <!-- Subject Name -->
                    <div class="col-6 mb-3">
                        <label for="subject_name" class="form-label">Subject Name</label>
                        <input type="text" name="subject_name" class="form-control @error('subject_name') is-invalid @enderror"  value="{{old('subject_name')}}"  minlength="5" placeholder="Enter Subject Name" required>
                         @error('subject_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Subject Code -->
                    <div class="col-6 mb-3">
                        <label for="subject_code" class="form-label">Subject Code</label>
                        <input type="text" name="subject_code" class="form-control @error('subject_code') is-invalid @enderror"  value="{{old('subject_code')}}"  placeholder="Enter Subject Code" required>
                         @error('subject_code')
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
