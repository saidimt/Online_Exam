@extends('layouts.main')

@section('content')

    <div class="col-xl-12 col-sm-12">
        <div class="card mb-4 bg-primary">
            <div class="card-body">
                <div class="welcome-widget">
                    <div class="text-white">
                        <!-- Welcome Message -->
                        <h5 class="text-truncate">
                            Welcome to the Online Examination System (OES)
                        </h5>
                        <h6 class="fw-light text-truncate">
                            Dear Student, you are now logged in successfully.
                        </h6>
                        
                        <!-- Instruction Message -->
                        <p class="mt-3">
                            Please select the type of examination you wish to take based on your instructor's guidance. You may choose from the following options:
                        </p>
                        
                        <ul class="list-group">
                            <li class="list-group-item">Quiz</li>
                            <li class="list-group-item">Test</li>
                            <li class="list-group-item">End of Course Exam</li>
                        </ul>
                        
                        <p class="mt-3">
                            Ensure you have reviewed all instructions provided by your instructor before proceeding.
                        </p>
                        <p class="mt-3">
                            Good luck with your examination!
                        </p>
                    </div>
                    <div class="text-end">
                        <!-- Optional image or logo can go here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
 <!-- App footer start -->
 <div class="app-footer text-center bg-dark text-black py-2">
    <span>© TCAA 2024  All right reserved</span>
 </div>
 <!-- App footer end -->
@endsection
