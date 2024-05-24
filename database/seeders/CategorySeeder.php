<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Meja'],
            ['name' => 'Kursi'],
            ['name' => 'Kasur'],
            ['name' => 'Sofa'],
            ['name' => 'Perkakas'],
        ];
        DB::table('categories')->insert($categories);
    }
}
