<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        
        return [
            'name' => $faker->word,
            'slug' => $faker->slug,
            'description' => $faker->sentence
        ];
    }
}
