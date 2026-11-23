<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Enrollment;
use App\Models\FeeStructure;
use App\Models\Payment;
use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $paymentsQuery = Payment::with('student');

        if ($startDate) {
            $paymentsQuery->whereDate('payment_date', '>=', $startDate);
        }

        if ($endDate) {
            $paymentsQuery->whereDate('payment_date', '<=', $endDate);
        }

        $payments = $paymentsQuery->latest()->get();

        $totalStudents = Student::count();

        $totalEnrollments = Enrollment::count();

        $totalCourses = Course::count();

        $totalFeeStructures = FeeStructure::count();

        $totalCollected = (clone $paymentsQuery)
            ->where('status', 'completed')
            ->sum('amount');

        $totalPending = (clone $paymentsQuery)
            ->where('status', 'pending')
            ->sum('amount');

        $paymentMethods = (clone $paymentsQuery)
            ->selectRaw('payment_method, COUNT(*) as total_records, SUM(amount) as total_amount')
            ->groupBy('payment_method')
            ->get();

        return view('reports.index', compact(
            'payments',
            'totalStudents',
            'totalEnrollments',
            'totalCourses',
            'totalFeeStructures',
            'totalCollected',
            'totalPending',
            'paymentMethods',
            'startDate',
            'endDate'
        ));

        
    }
    public function exportPdf(Request $request)
{
    $paymentsQuery = Payment::with('student');

    if ($request->start_date) {
        $paymentsQuery->whereDate('payment_date', '>=', $request->start_date);
    }

    if ($request->end_date) {
        $paymentsQuery->whereDate('payment_date', '<=', $request->end_date);
    }

    $payments = $paymentsQuery->latest()->get();

    $totalCollected = (clone $paymentsQuery)
        ->where('status', 'completed')
        ->sum('amount');

    $totalPending = (clone $paymentsQuery)
        ->where('status', 'pending')
        ->sum('amount');

    $pdf = Pdf::loadView('reports.pdf', compact(
        'payments',
        'totalCollected',
        'totalPending'
    ));

    return $pdf->download('ushindi-college-reports.pdf');
}
}
