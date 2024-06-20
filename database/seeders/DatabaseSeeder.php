<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Region;
use App\Models\Subscription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        Customer::factory(10)->create();
        Subscription::factory(5)->create();
        Region::factory(10)->create();
    }
}
