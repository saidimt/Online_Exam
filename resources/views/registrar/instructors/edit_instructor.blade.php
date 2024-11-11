<!-- resources/views/registrar/instructors/edit_instructor.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Instructor</h1>
        <!-- Form to edit instructor -->
        <form action="{{ route('instructors.update', $instructor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $instructor->first_name) }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $instructor->last_name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $instructor->email) }}" required>
            </div>

            <!-- Profile Picture Field -->
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                @if($instructor->profile_picture)
                    <img src="{{ asset('storage/'.$instructor->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Instructor</button>
        </form>
    </div>
@endsection
