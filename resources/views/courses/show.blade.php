
@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Course Details</h3>

        <a href="{{ route('courses.index') }}" class="btn btn-primary">
            Back to Courses
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <h5 class="fw-bold text-primary mb-3">
                {{ $course->name }}
            </h5>

            <p>
                <strong>Description:</strong><br>
                {{ $course->description ?: 'No description provided.' }}
            </p>

            <p>
                <strong>Status:</strong>
                @if($course->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </p>

            <p>
                <strong>Date Created:</strong>
                {{ $course->created_at->format('d M Y') }}
            </p>

            <a href="{{ route('courses.edit', $course->id) }}"
               class="btn btn-warning">
                Edit Course
            </a>

        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Course Fee Details</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-primary">
                        <tr>
                            <th>Semester</th>
                            <th>Academic Year</th>
                            <th>Fee Amount (KSh)</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($course->feeStructures as $fee)
                            <tr>
                                <td>{{ $fee->semester->name }}</td>
                                <td>{{ $fee->academicYear->name }}</td>
                                <td class="fw-bold">
                                    KSh {{ number_format($fee->amount, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    No fee has been assigned to this course yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <a href="{{ route('fee-structures.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Course Fee
            </a>

        </div>
    </div>

</div>

@endsection
