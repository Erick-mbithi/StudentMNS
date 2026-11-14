
@extends('layouts.app')

@section('title', 'Students | Student Management System')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Students</h2>
            <p class="text-muted">Manage all registered students.</p>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Add New Student
        </a>
    </div>

<form action="{{ route('students.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by admission number, name or email..."
            value="{{ request('search') }}"
        >

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search me-1"></i> Search
        </button>

        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
            Reset
        </a>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Admission No.</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->admission_number }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->course }}</td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ $student->status }}
                                    </span>
                                </td>
                                <td>
    <div class="d-flex gap-2">

        <td>
    <div class="d-flex gap-2">
        <a href="{{ route('students.show', $student->id) }}"
           class="btn btn-sm btn-outline-info">
            <i class="bi bi-eye"></i> View
        </a>

        <a href="{{ route('students.edit', $student->id) }}"
           class="btn btn-sm btn-outline-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>

        <form action="{{ route('students.destroy', $student->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this student?');">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</td>

    </div>
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No students registered yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{ $students->links() }}

        </div>
    </div>

</div>

@endsection
