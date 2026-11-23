
@extends('layouts.app')

@section('title', 'Reports')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Reports & Analytics</h2>
            <p class="text-muted mb-0">
                Ushindi College management reports
            </p>
        </div>

        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer me-2"></i>Print Reports
        </button>
    </div>

    <a href="{{ route('reports.pdf', request()->query()) }}"
   class="btn btn-danger">
    <i class="bi bi-file-earmark-pdf me-2"></i>
    Export PDF
</a>

    {{-- DATE FILTER --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('reports.index') }}" method="GET">
                <div class="row align-items-end">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date"
                               name="start_date"
                               class="form-control"
                               value="{{ $startDate }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date"
                               name="end_date"
                               class="form-control"
                               value="{{ $endDate }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Filter Reports
                        </button>

                        <a href="{{ route('reports.index') }}"
                           class="btn btn-secondary">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="row">

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted">Total Students</div>
                    <h3 class="fw-bold text-primary">
                        {{ number_format($totalStudents) }}
                    </h3>
                    <i class="bi bi-people fs-3 text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted">Total Enrollments</div>
                    <h3 class="fw-bold text-success">
                        {{ number_format($totalEnrollments) }}
                    </h3>
                    <i class="bi bi-mortarboard fs-3 text-success"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted">Total Courses</div>
                    <h3 class="fw-bold text-info">
                        {{ number_format($totalCourses) }}
                    </h3>
                    <i class="bi bi-book fs-3 text-info"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted">Fee Structures</div>
                    <h3 class="fw-bold text-warning">
                        {{ number_format($totalFeeStructures) }}
                    </h3>
                    <i class="bi bi-cash-stack fs-3 text-warning"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- FINANCIAL SUMMARY --}}
    <div class="row mb-4">

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Payments Collected</h6>
                    <h2 class="fw-bold text-success">
                        KSh {{ number_format($totalCollected, 2) }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Pending Payments</h6>
                    <h2 class="fw-bold text-danger">
                        KSh {{ number_format($totalPending, 2) }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    {{-- PAYMENT METHODS --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Payment Methods Summary</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Payment Method</th>
                        <th>Total Records</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($paymentMethods as $method)
                        <tr>
                            <td>{{ $method->payment_method }}</td>
                            <td>{{ $method->total_records }}</td>
                            <td>
                                KSh {{ number_format($method->total_amount, 2) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No payment records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAYMENT RECORDS --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Payment Transactions Report</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Reference</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $payment->student->first_name ?? '' }}
                                {{ $payment->student->last_name ?? '' }}
                            </td>

                            <td>
                                KSh {{ number_format($payment->amount, 2) }}
                            </td>

                            <td>{{ $payment->payment_method }}</td>

                            <td>
                                {{ $payment->transaction_reference ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $payment->payment_date
                                    ? $payment->payment_date->format('d M Y')
                                    : 'N/A' }}
                            </td>

                            <td>
                                @if($payment->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No payment transactions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>
    @media print {
        .sidebar,
        nav,
        button,
        form,
        .btn {
            display: none !important;
        }

        body {
            background: white !important;
        }

        .card {
            border: 1px solid #ddd !important;
            box-shadow: none !important;
        }
    }
</style>

@endsection
