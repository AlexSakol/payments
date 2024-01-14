<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            ['name' => 'User1',
            'email' => 'user1@mail.com',
            'role_id' => 1,
            'password' => Hash::make('User1')],
            ['name' => 'User2',
                'email' => 'user2@mail.com',
                'role_id' => 2,
                'password' => Hash::make('User2')],
            ['name' => 'User3',
                'email' => 'user3@mail.com',
                'role_id' => 3,
                'password' => Hash::make('User3')],
        ]);
    }
}
