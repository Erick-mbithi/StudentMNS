<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(5)
        ->withQueryString();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:courses,name',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course added successfully.');
    }

   public function show(Course $course)
{
    $course->load([
        'feeStructures.semester',
        'feeStructures.academicYear'
    ]);

    return view('courses.show', compact('course'));
}

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'name')->ignore($course->id),
            ],
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->enrollments()->exists() || $course->feeStructures()->exists()) {
            return redirect()->route('courses.index')
                ->with('error', 'This course cannot be deleted because it has enrollments or fee structures.');
        }

        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
