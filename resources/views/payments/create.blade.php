
@extends('layouts.app')

@section('title', 'Record Payment')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Record Student Payment</h2>
            <p class="text-muted mb-0">Record fees paid through M-Pesa, Cash or Bank.</p>
        </div>

        <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('payments.store') }}" method="POST">
                @csrf

                <div class="row">

                    {{-- Student --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Student</label>

                        <select name="student_id" class="form-select" required>
                            <option value="">Select Student</option>

                            @foreach($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->admission_number }}
                                    - {{ $student->first_name }} {{ $student->last_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('student_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Amount --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Amount (KSh)</label>

                        <input type="number"
                               name="amount"
                               class="form-control"
                               step="0.01"
                               min="1"
                               value="{{ old('amount') }}"
                               placeholder="Enter amount paid"
                               required>

                        @error('amount')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Payment Method --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Payment Method</label>

                        <select name="payment_method" class="form-select" required>
                            <option value="">Select Payment Method</option>
                            <option value="M-Pesa" {{ old('payment_method') == 'M-Pesa' ? 'selected' : '' }}>M-Pesa</option>
                            <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="Bank" {{ old('payment_method') == 'Bank' ? 'selected' : '' }}>Bank</option>
                        </select>

                        @error('payment_method')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Transaction Code --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Transaction Reference / M-Pesa Code</label>

                        <input type="text"
                               name="transaction_reference"
                               class="form-control"
                               value="{{ old('transaction_reference') }}"
                               placeholder="e.g. QGH7K2ABC3">

                        @error('transaction_reference')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Payment Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Payment Date</label>

                        <input type="date"
                               name="payment_date"
                               class="form-control"
                               value="{{ old('payment_date', date('Y-m-d')) }}"
                               required>

                        @error('payment_date')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Payment Status</label>

                        <select name="status" class="form-select" required>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>

                        @error('status')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('payments.index') }}" class="btn btn-light">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>Save Payment
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
