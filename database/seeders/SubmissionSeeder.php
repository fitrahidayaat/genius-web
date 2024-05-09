<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = \App\Models\Student::all();
        $missions = \App\Models\Mission::all();

        // add every ongoing missions to submission
        $students->each(function ($student) use ($missions) {
            $student->ongoingMissions->each(function ($ongoing) use ($student) {
                $submission = new \App\Models\Submission();
                $submission->student_id = $student->id;
                $submission->mission_id = $ongoing->id;
                $submission->file_path = $ongoing->image_path;
                $submission->status = 'pending';
                $submission->comment = "Submission kamu sedang di review. Mohon tunggu yaa..";
                $submission->save();
            });
        });

        // add every completed missions to submission
        $students->each(function ($student) use ($missions) {
            $student->completedMissions->each(function ($completed) use ($student) {
                $submission = new \App\Models\Submission();
                $submission->student_id = $student->id;
                $submission->mission_id = $completed->id;
                $submission->file_path = $completed->image_path;
                $submission->status = 'accepted';
                $submission->comment = "Submission kamu sudah diterima. Selamat yaa..";
                $submission->save();
            });
        });

        // add every failed missions to submission
        $students->each(function ($student) use ($missions) {
            $student->failedMissions->each(function ($failed) use ($student) {
                $submission = new \App\Models\Submission();
                $submission->student_id = $student->id;
                $submission->mission_id = $failed->id;
                $submission->file_path = $failed->image_path;
                $submission->status = 'rejected';
                $submission->comment = "Submission kamu ditolak. Coba lagi yaa..";
                $submission->save();
            });
        });
    }
}
