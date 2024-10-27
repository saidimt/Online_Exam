
@extends('layouts.main')

@section('content')
<div class="container mt-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="text-center">Quiz Instructions</h4>
                </div>
                <div class="card-body">
                    <!-- Examination Type -->
                    <div class="mb-4">
                        <h5>Examination Type: <span class="text-primary">End of The Cource</span></h5>
                    </div>
                    <div class="mb-4">
                        <h5>Courses Name: <span class="text-primary">Basic Airport Operations</span></h5>
                    </div>
                    
                    <!-- Examination Duration -->
                    <div class="mb-4">
                        <h5>Examination Time: <span class="text-primary">1:00 Hour</span></h5>
                    </div>
                    
                    <!-- Instructions List -->
                    <h5>Instructions:</h5>
                    <ol class="list-group list-group-numbered mb-4">
                        <li class="list-group-item">Ensure you are in a quiet and comfortable environment before starting the examination.</li>
                        <li class="list-group-item">Do not refresh or leave the exam page during the test, as it may result in automatic submission.</li>
                        <li class="list-group-item">Once the exam begins, you will have <strong>[Exam Duration]</strong> to complete the test.</li>
                        <li class="list-group-item">Make sure you have a stable internet connection to avoid interruptions during the exam.</li>
                        <li class="list-group-item">Follow the instructions carefully and answer all questions within the time limit.</li>
                        <li class="list-group-item">In case of technical issues, contact the exam administrator immediately.</li>
                    </ol>

                    <!-- Additional Notes -->
                    <div class="alert alert-warning">
                        <strong>Note:</strong> Once you start the exam, you cannot pause it. If you leave the exam, your progress may be lost.
                    </div>

                    <!-- Start Exam Button -->
                    <div class="d-grid">
                        <a href="{{ route('exam.start') }}" class="btn btn-primary btn-lg">
                            Start Examination
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection