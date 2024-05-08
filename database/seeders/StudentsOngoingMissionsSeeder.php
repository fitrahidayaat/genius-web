<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsOngoingMissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::delete("DELETE FROM student_ongoing_mission");
        $student = Student::first();
        $student->ongoingMissions()->attach(1);
        $student->ongoingMissions()->attach(2);
        Log::info($student->ongoingMissions);
        
    }
}
