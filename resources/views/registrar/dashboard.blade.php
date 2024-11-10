@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card bg-light mb-4">
            <div class="card-body">
                <h1 class="text-center">Welcome to the Online Examination System (OES)</h1>
                
                <p class="mt-4">
                Registrar. You are now logged into the Online Examination System (OES). This platform provides you with the tools and resources needed to efficiently manage student, instructor, and course registrations, as well as subject assignments. 
                </p>

                <h4>Your Key Responsibilities:</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Register and manage student profiles and information.</li>
                    <li class="list-group-item">Register and manage instructor profiles and information.</li>
                    <li class="list-group-item">Create, update, and organize course information, including course codes and durations.</li>
                    <li class="list-group-item">Assign subjects to courses with unique subject codes and manage subject listings.</li>
                </ul>

                

                <div class="alert alert-warning">
                    <strong>Important:</strong> Ensure all details for students, instructors, courses, and subjects are accurately entered and reviewed before finalizing. This ensures smooth operations and a successful examination process.
                </div>

                
            </div>
        </div>
    </div>
@endsection
