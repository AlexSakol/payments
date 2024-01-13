<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'name' => 'Бензин',
                'date' => '2024-01-04',
                'price' => 50.50,
                'user_id' => 1,
                'category_id' => 1,
                'type_id' => 2
            ],
            [
                'name' => 'Аванс',
                'date' => '2024-01-05',
                'price' => 500,
                'user_id' => 1,
                'category_id' => 6,
                'type_id' => 1
            ],
            [
                'name' => 'Фрукты',
                'date' => '2024-01-07',
                'price' => 30.60,
                'user_id' => 1,
                'category_id' => 2,
                'type_id' => 2
            ]
        ]);
    }
}
