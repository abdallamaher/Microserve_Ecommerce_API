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
            'seller_id' => 1,
            'description' => $this->faker->paragraph(),
            'quantity' => 10,
            'price' => 20.55,
        ];
    }
}
