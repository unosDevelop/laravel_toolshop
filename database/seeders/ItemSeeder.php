<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->pluck('id', 'name');

        $items = [
            'Sofa' => 'Sofa',
            'Kursi' => 'Kursi',
            'Meja' => 'Meja',
            'Lemari' => 'Perkakas',
            'Rak Buku' => 'Perkakas',
            'Meja Makan' => 'Meja',
            'Sofa Bed' => 'Sofa',
            'Bufet' => 'Perkakas',
            'Kasur' => 'Kasur',
            'Kursi Makan' => 'Kursi',
            'Kabinet' => 'Perkakas',
            'Kursi Panjang' => 'Kursi',
            'Rak Sepatu' => 'Perkakas',
            'Meja Kantor' => 'Meja',
            'Kursi Teras' => 'Kursi'
        ];

        $brands = ['IKEA', 'Ashley Furniture', 'La-Z-Boy', 'Herman Miller', 'Steelcase'];

        foreach (range(1, 10) as $index) {
            $itemName = array_keys($items)[array_rand(array_keys($items))];
            $item = new Item();
            $item->name = $itemName;
            $item->brand = $brands[array_rand($brands)];
            $categoryName = $items[$itemName];
            $categoryId = $categories[$categoryName];
            $item->category_id = $categoryId;
            $item->save();
        }
    }
}
