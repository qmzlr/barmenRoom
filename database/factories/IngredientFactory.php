<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'name' => fake()->sentence(),
         'recipe_id' => Recipe::query()->inRandomOrder()->first()->id,
         'quantity' => fake()->numberBetween(1, 1000),
         'unit' => fake()->word(),
      ];
   }
}
