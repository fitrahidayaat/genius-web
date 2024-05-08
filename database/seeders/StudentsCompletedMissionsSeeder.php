<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsCompletedMissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::all()->each(function ($student) {
            $student->completedMissions()->attach([1]);
            $student->ongoingMissions()->attach([2, 3, 4, 5]);
            $student->failedMissions()->attach([6, 7]);
        });
    }
}
