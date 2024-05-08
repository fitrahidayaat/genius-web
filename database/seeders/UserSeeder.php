<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::delete("DELETE FROM users");
        $user1 = new User();
        $user1->name = 'Muhammad Ramdhan Fitra Hidayat';
        $user1->email = 'fitrahidayaat@gmail.com';
        $user1->password = Hash::make('fitrahidayat123');
        $user1->role = 'teacher';
        $user1->image_path = 'default.jpg';
        $user1->google_id = null;
        $user1->save();

        $user2 = new User();
        $user2->name = 'Fahmi Agung Maulana';
        $user2->email = 'fahmiagungmaulana@gmail.com';
        $user2->password = Hash::make('fahmiagungmaulana123');
        $user2->role = 'student';
        $user2->image_path = 'default.jpg';
        $user2->google_id = null;
        $user2->save();

        $user3 = new User();
        $user3->name = 'John Doe';
        $user3->email = 'johndoe@gmail.com';
        $user3->password = Hash::make('johndoe123');
        $user3->role = 'student';
        $user3->image_path = 'default.jpg';
        $user3->google_id = null;
        $user3->save();

        $user4 = new User();
        $user4->name = 'Jane Doe';
        $user4->email = 'janedoe@gmail.com';
        $user4->password = Hash::make('janedoe123');
        $user4->role = 'student';
        $user4->image_path = 'default.jpg';
        $user4->google_id = null;
        $user4->save();

        $user5 = new User();
        $user5->name = 'Joko Widodo';
        $user5->email = 'jokowidodo@gmail.com';
        $user5->password = Hash::make('jokowidodo123');
        $user5->role = 'student';
        $user5->image_path = 'default.jpg';
        $user5->google_id = null;
        $user5->save();

    }
}
