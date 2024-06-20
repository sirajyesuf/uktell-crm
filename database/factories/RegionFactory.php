<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class RegionFactory extends Factory
{
    
    public function definition(): array
    {
        $continents = [
            'Africa',
            'Antarctica',
            'Asia',
            'Europe',
            'North America',
            'Australia',
            'South America'
        ];

        $continent = $continents[array_rand($continents)];
        
        return [
            'country_code' => fake()->countryCode(),
            'country_name' => fake()->country(),
            'regions' => $continent

        ];
    }
}
