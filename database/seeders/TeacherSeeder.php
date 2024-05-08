<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::delete("DELETE FROM teachers");
        $users = User::where('role', 'teacher')->get();
        $users->each(function ($user) {
            $user->teacher()->create([
                'user_id' => $user->id,
                'code' => Str::random(6),
            ]);
        });
    }
}
