<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Eierspeise',
                'Spiegelei',
                'Spaghetti',
                'Wiener Schnitzel',
                'Fleischlaberl',
                'Marmorkuchen',
                'Zupfbrot',
                'Würstel mit Saft',
                'Leberkäse',
                'Schinkenfleckerln'
            ]),
            'user_id' => "1",
            'description' => fake()->paragraph(3),
            'servings' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'worktime' => fake()->randomElement([10, 15, 20, 30, 45, 60]),


            //
        ];
    }
}
