<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        // Student and course statistics
        $totalStudents = Student::count();
        $totalCourses = Course::count();

        // Modules not yet created
        $totalTeachers = 0;
        $totalDepartments = 0;

        // Payment statistics
        $totalPayments = Payment::where('status', 'completed')
            ->sum('amount');

        $totalPaymentRecords = Payment::count();

        $pendingPayments = Payment::where('status', 'pending')
            ->count();

        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalTeachers',
            'totalDepartments',
            'totalPayments',
            'totalPaymentRecords',
            'pendingPayments'
        ));
    }
}
