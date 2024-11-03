@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card bg-light mb-4">
            <div class="card-body">
                <h1 class="text-center">Welcome to the Online Examination System (OES), Instructor</h1>
                <p class="mt-4">
                    Dear Registtrar, you are now logged into the Online Examination System (OES). This platform enables you to effectively manage all examination-related activities, including the creation, scheduling, and grading of exams for your students.
                </p>
                
                <h4>Key Responsibilities:</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Create and organize exams (up to 50 multiple-choice questions).</li>
                    <li class="list-group-item">Monitor and manage students' progress and performance.</li>
                    <li class="list-group-item">Review and grade students' completed exams.</li>
                    <li class="list-group-item">Ensure that all examinations comply with academic standards.</li>
                </ul>

                <p>
                    Please navigate through the system using the provided menu options to access all available tools and resources.
                </p>
                
                <div class="alert alert-warning">
                    <strong>Note:</strong> Ensure that all instructions and exam materials are carefully reviewed and properly uploaded before making them available to students.
                </div>

                <p class="text-center mt-4">
                    Thank you for contributing to a smooth and fair examination process. Your attention to detail and commitment ensures the success of your students.
                </p>
            </div>
        </div>
    </div>
@endsection
