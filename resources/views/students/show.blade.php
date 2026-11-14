
@extends('layouts.app')

@section('title', 'Student Details | MNS')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Student Details</h2>
            <p class="text-muted">View complete student information.</p>
        </div>

        <a href="{{ route('students.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Students
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">Personal Information</h5>

            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted">Admission Number</small>
                    <h6>{{ $student->admission_number }}</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Full Name</small>
                    <h6>{{ $student->first_name }} {{ $student->last_name }}</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Email Address</small>
                    <h6>{{ $student->email }}</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Phone Number</small>
                    <h6>{{ $student->phone ?? 'Not provided' }}</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Gender</small>
                    <h6>{{ $student->gender ?? 'Not provided' }}</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Course</small>
                    <h6>{{ $student->course }}</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Status</small>
                    <span class="badge bg-success">
                        {{ $student->status }}
                    </span>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
