
@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-primary">Fee Structure Details</h3>
            <p class="text-muted">View the expected course fee information.</p>
        </div>

        <a href="{{ route('fee-structures.index') }}" class="btn btn-secondary">
            Back to Fee Structures
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <div class="mb-4">
                <label class="text-muted">Course</label>
                <h5>{{ $feeStructure->course->name }}</h5>
            </div>

            <hr>

            <div class="mb-4">
                <label class="text-muted">Semester</label>
                <h5>{{ $feeStructure->semester->name }}</h5>
            </div>

            <hr>

            <div class="mb-4">
                <label class="text-muted">Academic Year</label>
                <h5>{{ $feeStructure->academicYear->name }}</h5>
            </div>

            <hr>

            <div class="mb-4">
                <label class="text-muted">Expected Fee Amount</label>
                <h4 class="fw-bold text-success">
                    KSh {{ number_format($feeStructure->amount, 2) }}
                </h4>
            </div>

            <a href="{{ route('fee-structures.edit', $feeStructure->id) }}"
               class="btn btn-warning">
                Edit Fee Structure
            </a>

        </div>
    </div>
</div>
@endsection
