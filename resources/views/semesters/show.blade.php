
@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Semester Details</h3>
            <p class="text-muted">View semester information</p>
        </div>

        <a href="{{ route('semesters.index') }}" class="btn btn-primary">
            Back
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="mb-0">Semester Information</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Semester Name</label>
                    <h5 class="fw-bold">{{ $semester->name }}</h5>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Academic Year</label>
                    <h5 class="fw-bold">
                        {{ $semester->academicYear->name ?? 'N/A' }}
                    </h5>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Start Date</label>
                    <h6>{{ $semester->start_date->format('d M Y') }}</h6>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">End Date</label>
                    <h6>{{ $semester->end_date->format('d M Y') }}</h6>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Status</label>
                    <div>
                        @if($semester->status == 'Active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Created At</label>
                    <h6>{{ $semester->created_at->format('d M Y, h:i A') }}</h6>
                </div>

            </div>

            <hr>

            <a href="{{ route('semesters.edit', $semester->id) }}"
                class="btn btn-warning">
                Edit Semester
            </a>

            <a href="{{ route('semesters.index') }}"
                class="btn btn-secondary">
                Back to List
            </a>

        </div>
    </div>
</div>
@endsection
