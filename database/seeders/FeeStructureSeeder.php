<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Semester;
use App\Models\AcademicYear;
use App\Models\FeeStructure;

class FeeStructureSeeder extends Seeder
{
    public function run(): void
    {
        $fees = [
            'Diploma in Software Development' => [35000, 32000],
            'Diploma in Computer Networking' => [30000, 28000],
            'Certificate in Information Technology' => [20000, 18000],
            'Diploma in Cyber Security' => [38000, 35000],
            'Diploma in Data Science' => [40000, 38000],
            'Diploma in Computer Science' => [36000, 34000],
        ];

        $academicYear = AcademicYear::where('name', '2026/2027')->first();

        if (!$academicYear) {
            $this->command->error('Academic year 2026/2027 was not found.');
            return;
        }

        foreach ($fees as $courseName => $amounts) {

            $course = Course::where('name', $courseName)->first();

            if (!$course) {
                continue;
            }

            foreach ([1, 2] as $index => $semesterNumber) {

                $semester = Semester::where('name', 'Semester ' . $semesterNumber)->first();

                if (!$semester) {
                    continue;
                }

                FeeStructure::updateOrCreate(
                    [
                        'course_id' => $course->id,
                        'semester_id' => $semester->id,
                        'academic_year_id' => $academicYear->id,
                    ],
                    [
                        'amount' => $amounts[$index],
                    ]
                );
            }
        }

        $this->command->info('Sample course fees inserted successfully.');
    }
}
