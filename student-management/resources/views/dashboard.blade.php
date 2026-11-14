
@extends('layouts.app')

@section('title', 'Dashboard | Student Management')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">
            Welcome to your Student Management System.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Students</p>
                            <h2 class="fw-bold">{{ $totalStudents }}</h2>
                        </div>
                        <i class="bi bi-people-fill fs-1 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Courses</p>
                            <h2 class="fw-bold">{{ $totalCourses }}</h2>
                        </div>
                        <i class="bi bi-book-fill fs-1 text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Teachers</p>
                            <h2 class="fw-bold">{{ $totalTeachers }}</h2>
                        </div>
                        <i class="bi bi-person-workspace fs-1 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Departments</p>
                            <h2 class="fw-bold">{{ $totalDepartments }}</h2>
                        </div>
                        <i class="bi bi-building-fill fs-1 text-danger"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <h5 class="fw-bold">System Overview</h5>
            <p class="text-muted mb-0">
                Manage student records, courses, teachers and departments
                from one place.
            </p>
        </div>
    </div>

</div>

@endsection
