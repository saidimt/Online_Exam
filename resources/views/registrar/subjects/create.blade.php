@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-light">Fill in the details below to register subjects.</h3>
            </div>
            <div class="text-end">
                <a href="{{ route('registrar.subject.import') }}" class="btn btn-primary">Import Subject</a>
            </div>
        </div>
        <div class="card bg-lightt mb-4">
            <div class="card-header">
                <h5 class="card-title">Subject Registration Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrar.subject.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="subject-fields-container">
    @php
        $oldSubjectNames = old('subject_name', []);
        $oldSubjectCodes = old('subject_code', []);
    @endphp

    @foreach ($oldSubjectNames as $index => $subjectName)
        <div class="subject-field row mb-3">
            <div class="col-6">
                <label for="subject_name_{{ $index }}" class="form-label">Subject Name:</label>
                <input type="text" name="subject_name[]" 
                       class="form-control @error('subject_name.' . $index) is-invalid @enderror" 
                       value="{{ $subjectName }}" 
                       minlength="5" 
                       placeholder="Enter Subject Name">
                @error('subject_name.' . $index)
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                <label for="subject_code_{{ $index }}" class="form-label">Subject Code:</label>
                <input type="text" name="subject_code[]" 
                       class="form-control @error('subject_code.' . $index) is-invalid @enderror" 
                       value="{{ $oldSubjectCodes[$index] ?? '' }}" 
                       placeholder="Enter Subject Code">
                @error('subject_code.' . $index)
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    @endforeach

    @if (empty($oldSubjectNames))
        <!-- Default empty field for first entry -->
        <div class="subject-field row mb-3">
            <div class="col-6">
                <label for="subject_name" class="form-label">Subject Name:</label>
                <input type="text" name="subject_name[]" class="form-control" minlength="5" placeholder="Enter Subject Name">
            </div>
            <div class="col-6">
                <label for="subject_code" class="form-label">Subject Code:</label>
                <input type="text" name="subject_code[]" class="form-control" placeholder="Enter Subject Code">
            </div>
        </div>
    @endif
</div>

                    <div class="d-flex justify-content-between">
                        <button type="button" id="add-subject-btn" class="btn btn-secondary">Add Another Subject</button>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const maxSubjects = 10;
            const subjectContainer = document.getElementById('subject-fields-container');
            const addSubjectButton = document.getElementById('add-subject-btn');

            addSubjectButton.addEventListener('click', function() {
                const subjectCount = subjectContainer.getElementsByClassName('subject-field').length;

                if (subjectCount < maxSubjects) {
                    const subjectField = document.createElement('div');
                    subjectField.classList.add('subject-field', 'row', 'mb-3');
                    subjectField.innerHTML = `
                        <div class="col-6">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" name="subject_name[]" class="form-control" minlength="5" placeholder="Enter Subject Name">
                        </div>
                        <div class="col-6">
                            <label for="subject_code" class="form-label">Subject Code</label>
                            <input type="text" name="subject_code[]" class="form-control" placeholder="Enter Subject Code">
                        </div>
                    `;
                    subjectContainer.appendChild(subjectField);
                } else {
                    alert('You can only register up to 10 subjects.');
                }
            });
        });
    </script>
@endsection
