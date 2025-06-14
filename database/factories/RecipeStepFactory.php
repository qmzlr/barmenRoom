<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeStep>
 */
class RecipeStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::query()->inRandomOrder()->first()->id,
            'number' => fake()->numberBetween(1, 10),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
        ];
        /* $table->id();
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('number');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();*/
    }
}
