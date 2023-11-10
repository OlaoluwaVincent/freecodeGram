<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{

    /**
     * This defines the fake data for the book database
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Randomly select 'CatA' or 'CatB' for the 'category' field
        $category = $this->faker->randomElement(['CatA', 'CatB']);

        // Randomly set 'sellable' to true or false
        $sellable = $this->faker->boolean();

        return [
            'id' => $this->faker->randomNumber(2),
            'author' => $this->faker->name(),
            'title' => $this->faker->sentence(2),
            'sellable' => $sellable,
            'publication_date' => $this->faker->date(),
            'category' => $category,
            'subject' => $this->faker->sentence(1),
            'pieces' => $this->faker->randomNumber(2),
        ];
    }
}
