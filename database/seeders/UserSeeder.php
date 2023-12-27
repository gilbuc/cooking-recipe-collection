<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Anton Antonius',
            'email' => 'anton@antonius.at',
            'email_verified_at' => now(),
            'password' => Hash::make('aabbcc01'),
            'remember_token' => Str::random(10),
        ]);
    }
}
