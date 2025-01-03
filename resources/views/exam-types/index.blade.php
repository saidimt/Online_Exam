@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-light">Examinations Types</h5> 
                <h3 class="fw-light">Manage</h3>
            </div> 

            <!-- Add Button on the Right -->
            <a href="{{ route('academic.exam-types') }}" class="btn btn-primary">Add Exam Type</a>
        </div> 
        <div class="card bg- mb-4">
            <div class="card-header">
                <h5 class="card-title">Exam Types</h5>
              </div>
            <div class="card-body">
                <livewire:academic.exam-type-table />
            </div>
        </div>
    </div>
@endsection
