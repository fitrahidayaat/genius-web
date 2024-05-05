<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create teacher
        // get first user
        $user = \App\Models\User::first();
        // create teacher
        $user->teacher()->create([
            'code' => 'TCH001',
        ]);
    }
}
