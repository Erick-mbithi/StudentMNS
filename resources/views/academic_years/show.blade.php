
@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Academic Year Details</h3>
            <p class="text-muted">View academic year information</p>
        </div>

        <a href="{{ route('academic-years.index') }}" class="btn btn-primary">
            Back
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="mb-0">Academic Year Information</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Academic Year</label>
                    <h5 class="fw-bold">{{ $academicYear->name }}</h5>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Status</label>
                    <div>
                        @if($academicYear->status == 'Active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Start Date</label>
                    <h6>{{ $academicYear->start_date->format('d M Y') }}</h6>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">End Date</label>
                    <h6>{{ $academicYear->end_date->format('d M Y') }}</h6>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="text-muted">Created At</label>
                    <h6>{{ $academicYear->created_at->format('d M Y, h:i A') }}</h6>
                </div>

            </div>

            <hr>

            <a href="{{ route('academic-years.edit', $academicYear->id) }}"
                class="btn btn-warning">
                Edit Academic Year
            </a>

            <a href="{{ route('academic-years.index') }}"
                class="btn btn-secondary">
                Back to List
            </a>

        </div>
    </div>
</div>
@endsection
