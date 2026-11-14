
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Student Enrollments</h2>
            <p class="text-muted">Manage student course registrations.</p>
        </div>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary">
            + New Enrollment
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollments->firstItem() + $loop->index }}</td>
                            <td>
                                {{ $enrollment->student->first_name }}
                                {{ $enrollment->student->last_name }}
                            </td>
                            <td>{{ $enrollment->course->name }}</td>
                            <td>{{ $enrollment->semester->name }}</td>
                            <td>{{ $enrollment->academicYear->name }}</td>
                            <td>
                                <a href="{{ route('enrollments.show', $enrollment) }}"
                                   class="btn btn-sm btn-info text-white">View</a>

                                <a href="{{ route('enrollments.edit', $enrollment) }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('enrollments.destroy', $enrollment) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this enrollment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No enrollments found yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $enrollments->links() }}
        </div>
    </div>
</div>
@endsection
