<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = ['Ei', 'Milch', 'Mehl', 'Zucker', 'Brösel', 'Gurke', 'Paprika', 'Tomate', 'Schlagobers',];
        foreach ($foods as $food) {
            DB::table('food')->insert([
                'name' => $food
            ]);

        }
    }
}
