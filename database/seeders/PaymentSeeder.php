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
                'is_income' => false,
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'Аванс',
                'date' => '2024-01-05',
                'price' => 500,
                'is_income' => true,
                'user_id' => 1,
                'category_id' => 6
            ],
            [
                'name' => 'Фрукты',
                'date' => '2024-01-07',
                'price' => 30.60,
                'is_income' => false,
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'Булка',
                'date' => '2024-01-10',
                'price' => 5.50,
                'is_income' => false,
                'user_id' => 2,
                'category_id' => 2
            ],
            [
                'name' => 'Зарплата',
                'date' => '2024-01-13',
                'price' => 1000,
                'is_income' => true,
                'user_id' => 2,
                'category_id' => 6
            ],
            [
                'name' => 'Квартиранты',
                'date' => '2024-01-10',
                'price' => 500.00,
                'is_income' => true,
                'user_id' => 2,
                'category_id' => 8
            ],
            [
                'name' => 'Буфет',
                'date' => '2024-01-05',
                'price' => 3.50,
                'is_income' => false,
                'user_id' => 3,
                'category_id' => 2
            ],
            [
                'name' => 'Шоколадка',
                'date' => '2024-01-10',
                'price' => 1.45,
                'is_income' => false,
                'user_id' => 3,
                'category_id' => 2
            ]
        ]);
    }
}
