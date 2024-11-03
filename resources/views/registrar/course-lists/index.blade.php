@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-light">Course Lists</h5> 
                <h3 class="fw-light">Manage</h3>
            </div> 

            <!-- Add Button on the Right -->
            <a href="{{ route('registrar.course-list.create') }}" class="btn btn-primary">Add Course List</a>
        </div> 
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card bg- mb-4">
            <div class="card-header">
                <h5 class="card-title">Course List</h5>
              </div>
            <div class="card-body">
                <livewire:registrar.course-list-table />
            </div>
        </div>
    </div>
@endsection
