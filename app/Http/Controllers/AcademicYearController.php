<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::latest()->paginate(10);

        return view('academic_years.index', compact('academicYears'));
    }

    public function create()
    {
        return view('academic_years.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:academic_years,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:0,1',
        ]);

        AcademicYear::create($validated);

        return redirect()->route('academic-years.index')
            ->with('success', 'Academic year created successfully.');
    }

    public function show(AcademicYear $academicYear)
    {
        return view('academic_years.show', compact('academicYear'));
    }

    public function edit(AcademicYear $academicYear)
    {
        return view('academic_years.edit', compact('academicYear'));
    }

    public function update(Request $request, AcademicYear $academicYear)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:academic_years,name,' . $academicYear->id,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:0,1',
        ]);

        $academicYear->update($validated);

        return redirect()->route('academic-years.index')
            ->with('success', 'Academic year updated successfully.');
    }

    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();

        return redirect()->route('academic-years.index')
            ->with('success', 'Academic year deleted successfully.');
    }
}
