<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'quantity' =>  $this->faker->randomNumber(),
            'original_price' =>  $this->faker->randomNumber(),
            'selling_price' =>$this->faker->randomNumber(),
        ];
    }
}
