
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = 120;
        $totalCourses = 8;
        $totalTeachers = 15;
        $totalDepartments = 5;

        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalTeachers',
            'totalDepartments'
        ));
    }
}
