@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <form method="POST" action="{{ route('login') }}" class="w-100" style="max-width: 400px;">
        @csrf
        <!-- Logo Section -->
         <div class="text-center mb-4">
            <a href="#">
                <img src="{{ asset('assets/images/logo/tccaa.png') }}" width="80" height="80" alt="TCAA Logo"
                     style="border-radius: 50%; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);">
            </a>
            <h4 class="mt-3 text-dark font-weight-bold">Online Examination System </h4>
            <div>[OES]</div>
        </div>
        {{-- <div class="text-center mb-4">
            <a href="#">
                <img src="{{ asset('assets/images/logo/tccaa.png') }}" class="rounded-circle mb-3" width="100" height="100" alt="TCAA Logo">
            </a>
            <h5 class="fw-bold text-primary">Online Examination System (OES)</h5>
        </div> --}}

        <!-- Card for Form Inputs -->
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <div class="mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="pwd" placeholder="Password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password Links -->
                {{-- <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                </div> --}}

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
            </div>
        </div>

        <!-- Copyright Footer -->
        <div class="text-center mt-4">
            <small class="text-muted">&copy; 2024 TCAA OES. All rights reserved.</small>
        </div>

    </form>
</div>
@endsection
