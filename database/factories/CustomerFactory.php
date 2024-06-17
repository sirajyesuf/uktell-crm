<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CustomerFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'billing_districtlines' => fake()->address(),
            'billing_addresslines' => fake()->address(),
            'billing_contactnumber' => fake()->phoneNumber(),
            'billing_postcode' => fake()->postcode()
        ];
    }
}
