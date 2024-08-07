<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => User::factory(),
            'order_number' => $this->faker->unique()->numberBetween(100000, 999999),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000),
            'tax' => $this->faker->randomFloat(2, 1, 100),
            'shipping_cost' => $this->faker->randomFloat(2, 5, 50),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered']),
            'payment_status' => $this->faker->randomElement(['unpaid', 'paid', 'refunded']),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'shipping_address' => $this->faker->address,
            'billing_address' => $this->faker->address,
            'notes' => $this->faker->optional()->sentence
        ];
    }
}