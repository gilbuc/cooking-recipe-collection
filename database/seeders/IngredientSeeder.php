<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            'food_id' => 1,
            'unit_id' => 9,
            'recipe_id' => 1,
            'amount' => 2.00
        ]);
        DB::table('ingredients')->insert([
            'food_id' => 2,
            'unit_id' => 2,
            'recipe_id' => 1,
            'amount' => 125.0,
            'note' => "warm"
        ]);

    }
}
