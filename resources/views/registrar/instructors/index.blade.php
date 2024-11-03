@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-light">Instructors</h5> 
                <h3 class="fw-light">Manage</h3>
            </div> 

            <!-- Add Button on the Right -->
            <a href="{{ route('registrar.instructors.registerInstructor') }}" class="btn btn-primary">register Instructor</a>
        </div> 
       
        <div class="card bg- mb-4">
            <div class="card-header">
                <h5 class="card-title">Instructor List</h5>
              </div>
            <div class="card-body">
                <livewire:registrar.instructor-table />
            </div>
        </div>
    </div>
@endsection