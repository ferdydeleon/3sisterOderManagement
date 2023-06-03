<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_number' =>  $this->faker->phoneNumber(),
            'town' =>  $this->faker->city(),
            'barangay' =>  $this->faker->state(),
            'street' =>  $this->faker->streetName(),
           // 'phone_number' =>  $this->faker->phoneNumber(),
           // 'town' =>  $this->faker->city(),
           // 'barangay' =>  $this->faker->state(),
           // 'street_number' =>  $this->faker->streetName(),

        ];
    }
}
