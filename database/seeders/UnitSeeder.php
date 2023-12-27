<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = ['Kg', 'dag', 'g', 'L', 'ml', 'dl', 'EL', 'TL', 'Stück'];
        foreach ($units as $unit) {
            DB::table('units')->insert([
                'name' => $unit
            ]);

        }

    }
}
