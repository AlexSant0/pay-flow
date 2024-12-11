<?php

namespace Payflow\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Payflow\Shared\Enums\DocumentTypeEnum;

class CustomerFactory extends Factory
{

    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'document_type' => $this->faker->randomElement(DocumentTypeEnum::cases())->value,
            'document_number' => $this->faker->randomNumber(5),
        ];
    }
}
