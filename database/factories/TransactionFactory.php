<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'amount' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'status' =>$this->faker->randomElement(['processing' ,'success', 'failed']), // password
            'date' => now(),
        ];
    }
}
