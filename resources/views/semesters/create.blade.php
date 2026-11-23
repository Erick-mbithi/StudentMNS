
@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Add Semester</h3>
            <p class="text-muted">Create a semester under an academic year</p>
        </div>

        <a href="{{ route('semesters.index') }}" class="btn btn-primary">
            Back
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('semesters.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Academic Year</label>

                        <select name="academic_year_id"
                            class="form-select @error('academic_year_id') is-invalid @enderror">

                            <option value="">Select Academic Year</option>

                            @foreach($academicYears as $year)
                                <option value="{{ $year->id }}"
                                    {{ old('academic_year_id') == $year->id ? 'selected' : '' }}>
                                    {{ $year->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('academic_year_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Semester Name</label>

                        <select name="name"
                            class="form-select @error('name') is-invalid @enderror">

                            <option value="">Select Semester</option>
                            <option value="Semester 1" {{ old('name') == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                            <option value="Semester 2" {{ old('name') == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                            <option value="Semester 3" {{ old('name') == 'Semester 3' ? 'selected' : '' }}>Semester 3</option>

                        </select>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}">

                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date"
                            class="form-control @error('end_date') is-invalid @enderror"
                            value="{{ old('end_date') }}">

                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

               <div class="col-md-6 mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select" required>
        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
            Active
        </option>

        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
            Inactive
        </option>
    </select>

    @error('status')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

                </div>

                <button type="submit" class="btn btn-success">
                    Save Semester
                </button>

                <a href="{{ route('semesters.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>
    </div>
</div>
@endsection
