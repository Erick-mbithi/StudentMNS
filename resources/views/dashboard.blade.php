@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Dashboard
    </h1>

    <div class="alert alert-primary">
        Welcome to the Student Management System.
    </div>

    <div class="row">

        {{-- Total Students --}}
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-blue">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="text-muted mb-2">
                                Total Students
                            </h6>

                            <h3 class="fw-bold mb-0">
                               200
                            </h3>
                        </div>

                       <i class="bi bi-people fs-1"></i>

                    </div>
                </div>
            </div>
        </div>

        {{-- Total Courses --}}
        <div class="col-md-6 col-lg-3 mb-4">
           <div class="card shadow-sm border-0 h-100 dashboard-card card-purple">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="text-muted mb-2">
                                Total Courses
                            </h6>

                            <h3 class="fw-bold mb-0">
                               5
                            </h3>
                        </div>

                        <i class="bi bi-book fs-1"></i>

                    </div>
                </div>
            </div>
        </div>

{{-- Total Payments --}}
        <div class="col-md-6 col-lg-3 mb-4">
    <div class="card dashboard-card card-purple border-0 shadow-sm h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Total Payments
                    </small>

                    <h3 class="fw-bold mb-0">
                        Ksh 700,000
                    </h3>
                </div>

                <i class="bi bi-credit-card fs-1"></i>
            </div>
        </div>
    </div>
</div>

        {{-- Fees Collected --}}
        <div class="col-md-6 col-lg-3 mb-4">
    <div class="card dashboard-card card-green border-0 shadow-sm h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Total Collected
                    </small>

                    <h3 class="fw-bold mb-0">
                        Ksh 2000000
                    </h3>
                </div>

                <i class="bi bi-cash-stack fs-1"></i>
            </div>
        </div>
    </div>
</div>

        {{-- Outstanding Fees --}}
        <div class="col-md-6 col-lg-3 mb-4">
    <div class="card dashboard-card card-red border-0 shadow-sm h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Outstanding Fees
                    </small>

                    <h3 class="fw-bold mb-0">
                        KSh 300000
                    </h3>
                </div>

                <i class="bi bi-exclamation-circle fs-1"></i>
            </div>
        </div>
    </div>

</div>

    </div>


</div>

@endsection