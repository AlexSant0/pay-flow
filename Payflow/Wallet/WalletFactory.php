<?php

namespace Payflow\Wallet;

use Illuminate\Database\Eloquent\Factories\Factory;
use Payflow\Customer\Customer;
use Payflow\Retailler\Retailler;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'user_type' => null,
            'user_id' => null,
            'balance' => $this->faker->randomNumber(5)
        ];
    }

    public function customer(): static
    {
        $customer = Customer::factory()->create();

        return $this->state(fn (array $attributes) => [
            'user_type' => get_class($customer),
            'user_id' => $customer->getKey(),
        ]);
    }

    public function retailer(): static
    {

        $retailer = Retailler::factory()->create();

        return $this->state(fn (array $attributes) => [
            'user_type' => get_class($retailer),
            'user_id' => $retailer->getKey(),
        ]);
    }
}
