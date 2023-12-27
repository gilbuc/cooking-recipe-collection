<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $meals = [
            'Eierspeise',
            'Zupfbrot',
            'Wiener Schnitzel',
            'Toast',
            'Spaghetti',
            'Rindsschnitzerl',
            'Rehragout'
        ];
        foreach ($meals as $meal) {
            DB::table('recipes')->insert([
                'user_id' => 1,
                'image' => $meal . '.jpg',
                'name' => $meal,
                'description' => 'Nach_Art_des_Hauses',
                'portion' => rand(1, 10),
                'worktime' => rand(1, 90),
                'instruction' => 'Einfach',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
