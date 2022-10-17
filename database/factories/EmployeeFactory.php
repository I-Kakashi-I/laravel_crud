<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'position' => $this->faker->word(),
            'birthday' => $this->faker->date(),
            'has_license' => $this->faker->boolean(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'department_id' => Department::all()->random(1)->first()->id,
            'branch_id' => Branch::all()->random(1)->first()->id
        ];
    }
}
