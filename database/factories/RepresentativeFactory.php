<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Representative>
 */
class RepresentativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "full_name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "telephone" => $this->faker->numerify('##########'),
            "current_route" => $this->faker->city(),
            "joined_date" => $this->faker->date('Y-m-d'),
            "comments" => $this->faker->text(),
        ];
    }
}
