<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use App\Models\Course;
use App\Models\Semester;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
 
public function index()
{
    $feeStructures = FeeStructure::with([
        'course',
        'semester',
        'academicYear'
    ])->latest()->paginate(10);

    return view('fee_structures.index', compact('feeStructures'));
}


    public function create()
    {
        $courses = Course::all();
        $semesters = Semester::all();
        $academicYears = AcademicYear::all();

        return view('fee_structures.create', compact(
            'courses',
            'semesters',
            'academicYears'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'semester_id' => 'required|exists:semesters,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'amount' => 'required|numeric|gt:0',
        ]);

        $duplicate = FeeStructure::where([
            'course_id' => $validated['course_id'],
            'semester_id' => $validated['semester_id'],
            'academic_year_id' => $validated['academic_year_id'],
        ])->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors([
                    'course_id' => 'A fee structure already exists for this course, semester and academic year.'
                ]);
        }

        FeeStructure::create($validated);

        return redirect()->route('fee-structures.index')
            ->with('success', 'Fee structure created successfully.');
    }

    public function show(FeeStructure $feeStructure)
    {
        $feeStructure->load([
            'course',
            'semester',
            'academicYear'
        ]);

        return view('fee_structures.show', compact('feeStructure'));
    }

    public function edit(FeeStructure $feeStructure)
    {
        $courses = Course::all();
        $semesters = Semester::all();
        $academicYears = AcademicYear::all();

        return view('fee_structures.edit', compact(
            'feeStructure',
            'courses',
            'semesters',
            'academicYears'
        ));
    }

    public function update(Request $request, FeeStructure $feeStructure)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'semester_id' => 'required|exists:semesters,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'amount' => 'required|numeric|gt:0',
        ]);

        $duplicate = FeeStructure::where([
            'course_id' => $validated['course_id'],
            'semester_id' => $validated['semester_id'],
            'academic_year_id' => $validated['academic_year_id'],
        ])->where('id', '!=', $feeStructure->id)->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors([
                    'course_id' => 'This fee structure already exists.'
                ]);
        }

        $feeStructure->update($validated);

        return redirect()->route('fee-structures.index')
            ->with('success', 'Fee structure updated successfully.');
    }

    public function destroy(FeeStructure $feeStructure)
    {
        $feeStructure->delete();

        return redirect()->route('fee-structures.index')
            ->with('success', 'Fee structure deleted successfully.');
    }
}