<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Авто'
            ],
            [
                'name' => 'Продукты'
            ],
            [
                'name' => 'Одежда и обувь'
            ],
            [
                'name' => 'Связь'
            ],
            [
                'name' => 'Коммунальные услуги'
            ],
            [
                'name' => 'Зарплата'
            ],
            [
                'name' => 'Проценты по карточкам'
            ],
            [
                'name' => 'Сдача в аренду'
            ],
            [
            'name' => 'Прочее'
            ]
        ]);
    }
}
