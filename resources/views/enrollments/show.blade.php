
@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Enrollment Details</h2>
            <p class="text-muted">View complete enrollment information.</p>
        </div>

        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">
            Back to Enrollments
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Student Enrollment Information</h5>
        </div>

        <div class="card-body p-4">

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Student Name:</strong>
                    <p>{{ $enrollment->student->first_name }}
                        {{ $enrollment->student->last_name }}</p>
                </div>

                <div class="col-md-6">
                    <strong>Admission Number:</strong>
<p>{{ $enrollment->student->admission_number }}</p>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Course:</strong>
                    <p>{{ $enrollment->course->name }}</p>
                </div>

                <div class="col-md-6">
                    <strong>Semester:</strong>
                    <p>{{ $enrollment->semester->name }}</p>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Academic Year:</strong>
                    <p>{{ $enrollment->academicYear->name }}</p>
                </div>

                <div class="col-md-6">
                    <strong>Date Registered:</strong>
                    <p>{{ $enrollment->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('enrollments.edit', $enrollment) }}"
                   class="btn btn-primary">Edit Enrollment</a>
            </div>

        </div>
    </div>

</div>
@endsection
