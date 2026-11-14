<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use App\Models\Semester;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with([
            'student',
            'course',
            'semester',
            'academicYear'
        ])->latest()->paginate(10);

        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $semesters = Semester::all();
        $academicYears = AcademicYear::all();

        return view('enrollments.create', compact(
            'students',
            'courses',
            'semesters',
            'academicYears'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'semester_id' => ['required', 'exists:semesters,id'],
            'academic_year_id' => ['required', 'exists:academic_years,id'],
        ]);

        $duplicate = Enrollment::where($validated)->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors(['student_id' => 'This student is already enrolled in this course, semester and academic year.']);
        }

        Enrollment::create($validated);

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment created successfully.');
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment->load([
            'student',
            'course',
            'semester',
            'academicYear'
        ]);

        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $courses = Course::all();
        $semesters = Semester::all();
        $academicYears = AcademicYear::all();

        return view('enrollments.edit', compact(
            'enrollment',
            'students',
            'courses',
            'semesters',
            'academicYears'
        ));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'semester_id' => ['required', 'exists:semesters,id'],
            'academic_year_id' => ['required', 'exists:academic_years,id'],
        ]);

        $duplicate = Enrollment::where($validated)
            ->where('id', '!=', $enrollment->id)
            ->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors(['student_id' => 'This enrollment already exists.']);
        }

        $enrollment->update($validated);

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}
