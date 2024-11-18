@extends('layouts.main')

@section('content')
<div class="container">
@if(session('error_messages'))
    <div class="alert alert-danger">
        <ul>
            @foreach(session('error_messages') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="card-header">
            <h5 class="card-title">Import Courses</h5>
        </div>
    </div>

    <div class="card bg-liaght mb-4">
        <div class="card-body">
            <form  method="POST" action="{{ route('registrar.course-list.import.courses') }}" enctype="multipart/form-data">
                @csrf

               

                <!-- File Input for Excel Document -->
                <div class="col-6 mb-3">
                    <label for="file" class="form-label">Select Excel File:</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Instructions for Excel Columns -->
                <small class="text-muted">Please ensure the file is in Excel format (.xlsx or .xls) and includes only the following columns:</small>
                <ul class="text-muted">
                    <li><strong>Course Name</strong></li>
                    <li><strong>Course Code</strong></li>
                    <li><strong>Duration</strong></li>
                </ul>

                <!-- Import Button -->
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-filetype-xlsx"></i> Import
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
