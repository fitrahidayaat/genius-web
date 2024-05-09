<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        //     TeacherSeeder::class,
        //     StudentSeeder::class,
        //     MissionSeeder::class,
        //     StudentsCompletedMissionsSeeder::class,
        //     SubmissionSeeder::class,
        // ]);

        // create 3 submissions 1 days ago for first student
        DB::table('submissions')->insert([
            'student_id' => 1,
            'mission_id' => 3,
            'file_path' => 'submissions/1.jpg',
            'status' => 'accepted',
            'comment' => 'Submission kamu sudah diterima. Selamat yaa..',
            'created_at' => now()->subDays(1),
            'updated_at' => now()->subDays(1),
        ]);

        // seed everything

    }
}
