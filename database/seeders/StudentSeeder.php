<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::delete("DELETE FROM students");
        $users = User::where('role', 'student')->get();
        $users->each(function ($user) {
            $teacher = Teacher::first();
            $user->student()->create([
                "user_id" => $user->id,
                "teacher_id" => $teacher->id,
                "points" => 0
            ]);
        });

    }
}
