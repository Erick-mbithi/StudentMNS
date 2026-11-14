
@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-primary">Courses</h3>
            <p class="text-muted">Manage all academic courses.</p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Course
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            Please check the submitted information.
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('courses.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search course name..."
                           value="{{ request('search') }}">

                    <button class="btn btn-primary" type="submit">
                        Search
                    </button>

                    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $courses->firstItem() + $loop->index }}</td>

                                <td class="fw-semibold">
                                    {{ $course->name }}
                                </td>

                                <td>
                                    {{ $course->description ?: 'No description' }}
                                </td>

                                <td>
                                    @if($course->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('courses.show', $course->id) }}"
                                       class="btn btn-sm btn-info text-white">View</a>

                                    <a href="{{ route('courses.edit', $course->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('courses.destroy', $course->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this course?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No courses found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="mt-3">
                {{ $courses->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
