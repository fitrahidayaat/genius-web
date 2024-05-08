<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::delete("DELETE FROM missions");
        $teacher = Teacher::first();

        $mission1 = new Mission();
        $mission1->teacher_id = $teacher->id;
        $mission1->title = 'Belajar Menanam Pohon';
        $mission1->description = 'Belajar menanam pohon di halaman rumah';
        $mission1->points = 100;
        $mission1->due_date = Date::now()->addWeek();
        $mission1->image_path = 'default-mission.jpg';
        $mission1->category = 'Belajar';
        $mission1->save();

        $mission2 = new Mission();
        $mission2->teacher_id = $teacher->id;
        $mission2->title = 'Belajar Menyapu Halaman';
        $mission2->description = 'Belajar menyapu halaman rumah';
        $mission2->points = 50;
        $mission2->due_date = Date::now()->addWeek();
        $mission1->image_path = 'default-mission.jpg';
        $mission2->category = 'Belajar';
        $mission2->save();

        $mission3 = new Mission();
        $mission3->teacher_id = $teacher->id;
        $mission3->title = 'Belajar Menyiram Tanaman';
        $mission3->description = 'Belajar menyiram tanaman di halaman rumah';
        $mission3->points = 75;
        $mission3->due_date = Date::now()->addWeek();
        $mission3->image_path = 'default-mission.jpg';
        $mission3->category = 'Belajar';
        $mission3->save();

        $mission4 = new Mission();
        $mission4->teacher_id = $teacher->id;
        $mission4->title = 'Belajar Menyapu Kamar';
        $mission4->description = 'Belajar menyapu kamar tidur';
        $mission4->points = 25;
        $mission4->due_date = Date::now()->addWeek();
        $mission4->image_path = 'default-mission.jpg';
        $mission4->category = 'Belajar';
        $mission4->save();


        // make the category kebersihan
        $mission5 = new Mission();
        $mission5->teacher_id = $teacher->id;
        $mission5->title = 'Belajar Menyapu Halaman';
        $mission5->description = 'Belajar menyapu halaman rumah';
        $mission5->points = 50;
        $mission5->due_date = Date::now()->addWeek();
        $mission5->image_path = 'default-mission.jpg';
        $mission5->category = 'Kebersihan';
        $mission5->save();
        
        $mission6 = new Mission();
        $mission6->teacher_id = $teacher->id;
        $mission6->title = 'Belajar Menyapu Halaman';
        $mission6->description = 'Belajar menyapu halaman rumah';
        $mission6->points = 50;
        $mission6->due_date = Date::now()->addWeek();
        $mission6->image_path = 'default-mission.jpg';
        $mission6->category = 'Kebersihan';
        $mission6->save();

        $mission7 = new Mission();
        $mission7->teacher_id = $teacher->id;
        $mission7->title = 'Belajar Menyapu Halaman';
        $mission7->description = 'Belajar menyapu halaman rumah';
        $mission7->points = 50;
        $mission7->due_date = Date::now()->addWeek();
        $mission7->image_path = 'default-mission.jpg';
        $mission7->category = 'Kebersihan';
        $mission7->save();
    }
}
