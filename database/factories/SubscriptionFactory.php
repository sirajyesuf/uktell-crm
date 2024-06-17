<?php

namespace Database\Factories;

use App\Models\Bundle;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class SubscriptionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'bundle_id' => Bundle::all()->random()->id,
         ];
    }
}
