@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="card-header">
            <h5 class="card-title">Import Subjects</h5>
        </div>
    </div>

    <div class="card bg-light mb-4">
        <div class="card-body">
            <form action="{{ route('registrar.import .subjects') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Subject Selection -->
                <div class="col-6 mb-3">
                    <label for="subject_id" class="form-label">Select Subject</label>
                    <select name="subject_id" class="form-select @error('subject_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select a subject</option>
                        <option value="1" {{ old('subject_id') == '1' ? 'selected' : '' }}>Mathematics</option>
                        <option value="2" {{ old('subject_id') == '2' ? 'selected' : '' }}>Physics</option>
                        @error('subject_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </select>
                </div>

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
                    <li><strong>Subject Name</strong></li>
                    <li><strong>Subject Code</strong></li>
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
