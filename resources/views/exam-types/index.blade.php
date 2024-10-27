@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card bg-light mb-4">
            <div class="card-body">
                <livewire:academic.exam-type-table />
            </div>
        </div>
    </div>
@endsection
