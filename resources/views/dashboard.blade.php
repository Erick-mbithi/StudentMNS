
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- Dashboard Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">College Dashboard</h2>
            <p class="text-muted mb-0">
                Welcome to USHINDI COLLEGE Management System
            </p>
        </div>

        <span class="badge bg-primary px-3 py-2 mt-3 mt-md-0">
            <i class="bi bi-mortarboard-fill me-1"></i>
            College Administration
        </span>
    </div>

    {{-- Welcome Banner --}}
    <div class="card border-0 shadow-sm mb-4"
         style="background: linear-gradient(135deg, #0d6efd, #173b75);
                color: white; border-radius: 15px;">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold mb-2">
                        Welcome to USHINDI COLLEGE
                    </h3>
                    <p class="mb-0">
                        Manage students, courses, enrollments and academic
                        activities from one central dashboard.
                    </p>
                </div>

                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <i class="bi bi-mortarboard-fill"
                       style="font-size: 80px; opacity: 0.25;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics --}}
    <div class="row">

        {{-- Total Students --}}
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-blue">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Students</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($totalStudents) }}
                            </h3>
                            <small class="text-muted">Registered students</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-people fs-2 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Courses --}}
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-purple">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Courses</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($totalCourses) }}
                            </h3>
                            <small class="text-muted">Available programmes</small>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-book fs-2 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Payment Records --}}
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-purple">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Payment Records</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($totalPaymentRecords) }}
                            </h3>
                            <small class="text-muted">All recorded payments</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-credit-card fs-2 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Fees Collected --}}
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-green">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Fees Collected</p>
                            <h3 class="fw-bold mb-0">
                                KSh {{ number_format((float) $totalPayments, 2) }}
                            </h3>
                            <small class="text-muted">Completed payments</small>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-cash-stack fs-2 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Payments --}}
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-red">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Pending Payments</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($pendingPayments) }}
                            </h3>
                            <small class="text-muted">Awaiting confirmation</small>
                        </div>
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-hourglass-split fs-2 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- System Overview --}}
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-grid me-2 text-primary"></i>
                        System Overview
                    </h5>

                    <p class="text-muted">
                        USHINDI COLLEGE provides a centralized platform for
                        managing student records, academic programmes,
                        enrollments, fee structures and academic calendars.
                    </p>

                    <div class="row mt-4">

                        <div class="col-md-4 mb-3">
                            <div class="p-3 bg-light rounded h-100">
                                <i class="bi bi-people text-primary fs-4"></i>
                                <h6 class="fw-bold mt-2">Student Management</h6>
                                <small class="text-muted">
                                    Register, view and manage student information.
                                </small>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="p-3 bg-light rounded h-100">
                                <i class="bi bi-book text-primary fs-4"></i>
                                <h6 class="fw-bold mt-2">Academic Management</h6>
                                <small class="text-muted">
                                    Manage courses, academic years and semesters.
                                </small>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="p-3 bg-light rounded h-100">
                                <i class="bi bi-cash-stack text-primary fs-4"></i>
                                <h6 class="fw-bold mt-2">Fee Management</h6>
                                <small class="text-muted">
                                    Manage fee structures and monitor payment records.
                                </small>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
