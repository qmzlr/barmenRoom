<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'title' => fake()->sentence(),
         'description' => fake()->paragraph(),
         'image' => fake()->imageUrl(),
         'author' => fake()->name(),
         'user_id' => User::query()->inRandomOrder()->first()->id
      ];
   }
}
