<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'type' => $this->faker->firstName(),
            'quantity' => 999,
            'current_quantity' => $this->faker->numberBetween(1, 999),
            'min_quantity' => 10,
            'max_quantity' => 1000,
            'price' => $this->faker->numberBetween(1, 999),
            'serial' => $this->faker->numberBetween(10000000000,99999999999),

        ];
    }
}
