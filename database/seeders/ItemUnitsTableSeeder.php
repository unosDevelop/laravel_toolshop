<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemUnit;
use Illuminate\Support\Facades\DB;

class ItemUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = ['baik', 'rusak', 'perlu diperbaiki', 'sedang diperbaiki'];

        foreach ($conditions as $condition) {
            for ($i = 0; $i < 10; $i++) {
                $unitCode = $this->generateUniqueUnitCode();

                ItemUnit::create([
                    'item_id' => rand(1, 10),
                    'condition' => $condition,
                    'unit_code' => $unitCode,
                ]);
            }
        }
    }

    /**
     * Generate a unique unit code.
     *
     * @return int
     */
    private function generateUniqueUnitCode()
    {
        do {
            $number = mt_rand(1000000000, 9999999999);
        } while ($this->unitCodeExists($number));

        return $number;
    }

    /**
     * Check if a unit code exists.
     *
     * @param  int  $code
     * @return bool
     */
    private function unitCodeExists($code)
    {
        return ItemUnit::where('unit_code', $code)->exists();
    }
}
