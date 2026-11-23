
@extends('layouts.app')

@section('title', 'Edit Payment')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Edit Payment</h2>
            <p class="text-muted mb-0">Update student payment information.</p>
        </div>

        <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Student --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Student</label>

                        <select name="student_id" class="form-select" required>
                            <option value="">Select Student</option>

                            @foreach($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ old('student_id', $payment->student_id) == $student->id ? 'selected' : '' }}>
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
                               value="{{ old('amount', $payment->amount) }}"
                               required>

                        @error('amount')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Payment Method --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Payment Method</label>

                        <select name="payment_method" class="form-select" required>
                            <option value="M-Pesa" {{ old('payment_method', $payment->payment_method) == 'M-Pesa' ? 'selected' : '' }}>M-Pesa</option>
                            <option value="Cash" {{ old('payment_method', $payment->payment_method) == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="Bank" {{ old('payment_method', $payment->payment_method) == 'Bank' ? 'selected' : '' }}>Bank</option>
                        </select>

                        @error('payment_method')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Transaction Reference --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Transaction Reference / M-Pesa Code</label>

                        <input type="text"
                               name="transaction_reference"
                               class="form-control"
                               value="{{ old('transaction_reference', $payment->transaction_reference) }}">

                        @error('transaction_reference')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Payment Date</label>

                        <input type="date"
                               name="payment_date"
                               class="form-control"
                               value="{{ old('payment_date', $payment->payment_date?->format('Y-m-d')) }}"
                               required>

                        @error('payment_date')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Payment Status</label>

                        <select name="status" class="form-select" required>
                            <option value="completed" {{ old('status', $payment->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="pending" {{ old('status', $payment->status) == 'pending' ? 'selected' : '' }}>Pending</option>
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
                        <i class="bi bi-check-circle me-2"></i>Update Payment
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
