@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-light">Registered Students</h5>

            </div>

            <!-- Add Button on the Right -->
            <a href="{{ route('registrar.students.registerStudent') }}" class="btn btn-primary">Register Student</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card bg- mb-4">
            <div class="card-header">
                <h5 class="card-title">Student List</h5>
              </div>
            <div class="card-body">
                <livewire:registrar.student-table />
            </div>
        </div>
    </div>
@endsection
