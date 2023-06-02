<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderlistFactory extends Factory
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
            'order' =>  $this->faker->creditCardType(),
            'amount' =>  $this->faker->numberBetween($min = 1000, $max = 9000),
            'payment' => $this->faker->creditCardType(),
            'town' =>  $this->faker->city(),
            'barangay' =>  $this->faker->state(),
            'street_number' =>  $this->faker->streetName(),
            'note' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
