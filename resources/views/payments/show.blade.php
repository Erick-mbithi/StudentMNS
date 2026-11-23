
@extends('layouts.app')

@section('title', 'Payment Details')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h2 class="fw-bold mb-1">Payment Details</h2>
            <p class="text-muted mb-0">View transaction information and print receipt.</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back
            </a>

            <button onclick="window.print()" class="btn btn-primary">
                <i class="bi bi-printer me-2"></i>Print Receipt
            </button>
        </div>
    </div>

    <div class="card border-0 shadow-sm" id="receipt">
        <div class="card-body p-4">

            {{-- Receipt Header --}}
            <div class="text-center mb-4">
                <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
                <h2 class="fw-bold mt-2">USHINDI COLLEGE</h2>
                <p class="text-muted mb-0">Official Fee Payment Receipt</p>
            </div>

            <hr>

            <div class="row mb-4">

                <div class="col-md-6">
                    <h5 class="fw-bold">Student Information</h5>

                    <p class="mb-1">
                        <strong>Admission Number:</strong>
                        {{ $payment->student->admission_number ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <strong>Student Name:</strong>
                        {{ $payment->student->first_name ?? '' }}
                        {{ $payment->student->last_name ?? '' }}
                    </p>

                    <p class="mb-1">
                        <strong>Email:</strong>
                        {{ $payment->student->email ?? 'N/A' }}
                    </p>
                </div>

                <div class="col-md-6">
                    <h5 class="fw-bold">Transaction Information</h5>

                    <p class="mb-1">
                        <strong>Receipt Number:</strong>
                        PAY-{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}
                    </p>

                    <p class="mb-1">
                        <strong>Payment Date:</strong>
                        {{ $payment->payment_date ? $payment->payment_date->format('d M Y') : 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <strong>Payment Method:</strong>
                        {{ $payment->payment_method }}
                    </p>

                    <p class="mb-1">
                        <strong>Transaction Reference:</strong>
                        {{ $payment->transaction_reference ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <strong>Status:</strong>
                        {{ ucfirst($payment->status) }}
                    </p>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Description</th>
                            <th class="text-end">Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Student Fee Payment</td>
                            <td class="text-end">
                                KSh {{ number_format((float)$payment->amount, 2) }}
                            </td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Total Paid</th>
                            <th class="text-end">
                                KSh {{ number_format((float)$payment->amount, 2) }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-center mt-4">
                <p class="fw-semibold mb-1">Thank you for your payment.</p>
                <p class="text-muted">USHINDI COLLEGE</p>
            </div>

        </div>
    </div>

</div>

@endsection

@section('styles')
<style>
    @media print {

        body {
            background: white !important;
        }

        nav, aside, .sidebar, .navbar,
        button, .btn, a.btn {
            display: none !important;
        }

        #receipt {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        #receipt .card-body {
            padding: 20px !important;
        }

        body * {
            visibility: hidden;
        }

        #receipt, #receipt * {
            visibility: visible;
        }

        #receipt {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }
</style>
@endsection
