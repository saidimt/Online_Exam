@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-light">Register Subjects</h3>
            <p class="text-muted">Fill in the details below to register subjects by uploading an Excel file with the subject name and subject code.</p>
        </div>
    </div>
    <div class="card bg-light mb-4">
        <div class="card-header">
            <h5 class="card-title">Import Subjects</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('registrar.import.subjects') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Subject Name -->
                <div class="col-6 mb-3">
                    <label for="file" class="form-label">Select Excel File:</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Course Selection (optional if needed for the import) -->
                <div class="col-6 mb-3">
                    <label for="course_id" class="form-label">Course Name</label>
                    <select name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select a course</option>
                        <option value="1" {{ old('course_id') == '1' ? 'selected' : '' }}>Basic Airport Operation Course</option>
                        <option value="2" {{ old('course_id') == '2' ? 'selected' : '' }}>Flight Operations Course</option>
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-filetype-xlsx"></i> Import Subjects
                </button>
            </form>
        </div>
    </div>
</div>
@endsection



{{-- <!-- resources/views/academic/import.blade.php -->
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-light">Register Students for Courses</h3>
            <p class="text-muted">Fill in the details below to register students for the Basic Airport Operation Course or Flight Operations Course.</p>
        </div>

    </div>
    <div class="card bg-lighth mb-4">
        <div class="card-header">
            <h5 class="card-title">Import Students</h5>
        </div>
        <div class="card-body">
    <form action="{{ route('academic.import.students') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
        <div class="col-6  mb-3">
            <label for="file" class="form-label">Select Excel File:</label>
            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <button type="submit" class="btn btn-success">  <i class="bi bi-filetype-xlsx"></i> Import</button>
    </form>
</div>
</div>
</div>
@endsection --}}
