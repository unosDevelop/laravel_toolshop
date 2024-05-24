<?php

namespace Database\Factories;

use App\Models\ItemUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemUnitFactory extends Factory
{
    protected $model = ItemUnit::class;

    public function definition()
    {
        return [
            'item_id' => $this->faker->numberBetween(1, 10),
            'condition' => $this->faker->randomElement(['baik', 'rusak', 'perlu diperbaiki', 'sedang diperbaiki']),
            'unit_code' => $this->generateUniqueUnitCode(),
        ];
    }

    private function generateUniqueUnitCode()
    {
        do {
            $number = mt_rand(1000000000, 9999999999);
        } while (ItemUnit::where('unit_code', $number)->exists());

        return $number;
    }
}
