
@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="my-5">
    @csrf
    <a href="#" class="mb-4 d-flex justify-content-center" >
        <img src="{{asset('assets/images/logo/tccaa.png')}}" style="border-radius:50%;" width="100" height="100" "class="img-fluid login-logo"  alt="Bootstrap Gallery" /> 
    </a>
    <div class="cardd mb-4">
        <div class="card-header">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="h6 text-center">Online Examination System (OES)</div>                  
            </div>                  
        </div>
        <div class="card-body">
            <div class="login-form">
                <div class="bg-white border border-dark rounded-2 p-4 mt-1">
                    <div class="mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Your Email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                   
                    <div class="d-grid py-3">
                        <button type="submit" class="btn btn-lg btn-primary">Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Add the copyright text here -->
<div class="text-center mt-4">
    <p>&copy; 2024, TCAA OES. All rights reserved.</p>
</div>

@endsection
