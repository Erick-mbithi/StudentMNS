
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h3 class="fw-bold text-primary">Edit Fee Structure</h3>
        <p class="text-muted">Update the fee details below.</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('fee-structures.update', $feeStructure->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Course</label>
                    <select name="course_id" class="form-select">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}"
                                {{ old('course_id', $feeStructure->course_id) == $course->id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Semester</label>
                    <select name="semester_id" class="form-select">
                        @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}"
                                {{ old('semester_id', $feeStructure->semester_id) == $semester->id ? 'selected' : '' }}>
                                {{ $semester->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('semester_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Academic Year</label>
                    <select name="academic_year_id" class="form-select">
                        @foreach($academicYears as $year)
                            <option value="{{ $year->id }}"
                                {{ old('academic_year_id', $feeStructure->academic_year_id) == $year->id ? 'selected' : '' }}>
                                {{ $year->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('academic_year_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Fee Amount (KSh)</label>
                    <input type="number"
                           name="amount"
                           class="form-control"
                           step="0.01"
                           min="0.01"
                           value="{{ old('amount', $feeStructure->amount) }}">

                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Update Fee Structure
                    </button>

                    <a href="{{ route('fee-structures.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
