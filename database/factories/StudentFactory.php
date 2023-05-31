<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'fname' => $this->faker->name(),
                'lname' => $this->faker->name(),
                'username' => $this->faker->name(),
                'password' => $this->faker->name(),
                'address' => $this->faker->name(),
                'phone' => 1234567890,
                'city' => $this->faker->name(),
                'street' => $this->faker->name(),
            ];
    }
}
