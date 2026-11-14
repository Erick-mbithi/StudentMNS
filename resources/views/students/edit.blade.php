
@extends('layouts.app')

@section('title', 'Edit Student | MNS')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Edit Student</h2>
        <p class="text-muted mb-0">Update student information.</p>
    </div>

    <a href="{{ route('students.index') }}"
       class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        Back to Students
    </a>

</div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('students.update', $student->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Admission Number</label>
                        <input type="text" name="admission_number"
                            class="form-control"
                            value="{{ old('admission_number', $student->admission_number) }}"
                            required>
                        @error('admission_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name"
                            class="form-control"
                            value="{{ old('first_name', $student->first_name) }}"
                            required>
                        @error('first_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name"
                            class="form-control"
                            value="{{ old('last_name', $student->last_name) }}"
                            required>
                        @error('last_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email"
                            class="form-control"
                            value="{{ old('email', $student->email) }}"
                            required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone"
                            class="form-control"
                            value="{{ old('phone', $student->phone) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <input type="text" name="course"
                            class="form-control"
                            value="{{ old('course', $student->course) }}"
                            required>
                        @error('course')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="Active" {{ old('status', $student->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $student->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>
                        Update Student
                    </button>

                    <a href="{{ route('students.index') }}"
                       class="btn btn-light border">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
