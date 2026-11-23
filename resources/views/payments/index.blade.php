
@extends('layouts.app')

@section('title', 'Payments')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Payments Management</h2>
            <p class="text-muted mb-0">Manage student fee payments and transactions.</p>
        </div>

        <a href="{{ route('payments.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Record Payment
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Transaction Code</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($payments as $payment)

                            <tr>
                                <td>{{ $payments->firstItem() + $loop->index }}</td>

                                <td>
                                    @if($payment->student)
                                        {{ $payment->student->first_name }}
                                        {{ $payment->student->last_name }}
                                    @else
                                        <span class="text-muted">Student unavailable</span>
                                    @endif
                                </td>

                                <td class="fw-semibold">
                                    KSh {{ number_format((float)$payment->amount, 2) }}
                                </td>

                                <td>
                                    <span class="badge bg-light text-dark">
                                        {{ $payment->payment_method }}
                                    </span>
                                </td>

                                <td>{{ $payment->transaction_reference ?? 'N/A' }}</td>

                                <td>
                                    {{ $payment->payment_date ? $payment->payment_date->format('d M Y') : 'N/A' }}
                                </td>

                                <td>
                                    @if($payment->status === 'completed')
                                        <span class="badge bg-success">Completed</span>
                                    @elseif($payment->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('payments.show', $payment->id) }}"
                                           class="btn btn-sm btn-outline-info"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('payments.edit', $payment->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('payments.destroy', $payment->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this payment?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <i class="bi bi-wallet2 fs-1 text-muted"></i>
                                    <p class="mt-2 mb-0">No payment records found.</p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

            <div class="mt-3">
                {{ $payments->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
