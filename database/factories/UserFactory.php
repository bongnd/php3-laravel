<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'role' => $this->faker->randomElement(['admin', 'customer']),
        ];
    }
}
