<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Diploma in Software Development',
                'description' => 'Programming, web development, databases and software engineering.',
                'status' => true,
            ],
            [
                'name' => 'Diploma in Computer Networking',
                'description' => 'Computer networks, server administration and IT infrastructure.',
                'status' => true,
            ],
            [
                'name' => 'Certificate in Information Technology',
                'description' => 'Computer fundamentals, office applications and IT support.',
                'status' => true,
            ],
            [
                'name' => 'Diploma in Cyber Security',
                'description' => 'Network security, risk management and security fundamentals.',
                'status' => true,
            ],
            [
                'name' => 'Diploma in Data Science',
                'description' => 'Data analysis, statistics, databases and Python programming.',
                'status' => true,
            ],
            [
                'name' => 'Diploma in Computer Science',
                'description' => 'Programming, algorithms, databases and computing principles.',
                'status' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['name' => $course['name']],
                $course
            );
        }
    }
}
