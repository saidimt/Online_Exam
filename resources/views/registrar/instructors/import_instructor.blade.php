@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Import Instructors</h3>
                <p class="text-muted">Upload an Excel file containing instructor details (First Name, Middle Name, Surname, and Email).</p>
            </div>
            {{-- <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Back to Instructors</a> --}}
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Instructor Import Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.import.instructors') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="file" class="form-label">Select Excel File</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".xls,.xlsx" required>
                        <small class="text-muted">Please upload an Excel file (.xls or .xlsx) with columns: First Name, Middle Name, Surname, Email.</small>
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-filetype-xlsx"></i> Import
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
