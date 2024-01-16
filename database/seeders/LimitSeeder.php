<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('limits')->insert([
           [
               'start_date' => '2024-01-01',
               'end_date' => '2024-01-31',
               'price' => 1500,
               'user_id' => 1
           ],
           [
               'start_date' => '2024-01-01',
               'end_date' => '2024-01-31',
               'price' => 1000,
               'user_id' => 2
           ]
        ]);
    }
}
