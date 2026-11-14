<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::with('academicYear')
            ->latest()
            ->paginate(10);

        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        $academicYears = AcademicYear::all();

        return view('semesters.create', compact('academicYears'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:Active,Inactive',
        ]);

        Semester::create($validated);

        return redirect()->route('semesters.index')
            ->with('success', 'Semester created successfully.');
    }

    public function show(Semester $semester)
    {
        $semester->load('academicYear');

        return view('semesters.show', compact('semester'));
    }

    public function edit(Semester $semester)
    {
        $academicYears = AcademicYear::all();

        return view('semesters.edit', compact('semester', 'academicYears'));
    }

    public function update(Request $request, Semester $semester)
    {
        $validated = $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:Active,Inactive',
        ]);

        $semester->update($validated);

        return redirect()->route('semesters.index')
            ->with('success', 'Semester updated successfully.');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();

        return redirect()->route('semesters.index')
            ->with('success', 'Semester deleted successfully.');
    }
}
