<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'payment_method' => $this->faker->randomElement(['COD', 'Bank Transfer', 'Momo', 'VnPay']),
            'status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
        ];
    }
}
