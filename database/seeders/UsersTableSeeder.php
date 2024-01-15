<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'editorUser',
                'password' => Hash::make('password'), // Folosind Hash pentru securitate
                'role' => 'editor',
                'created_at' => now(), // now() setează timestamp-ul curent
            ],
            // Adaugă aici alți utilizatori, dacă este necesar
        ]);
    }
}

