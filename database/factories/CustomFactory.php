<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apply_date' => $this->faker->date(),
            'applier_id' => $this->faker->randomElement(User::pluck('user_id')),
            'cust_id' => $this->faker->randomElement(Customer::pluck('cust_id')),
            'custom_content' => $this->faker->text
        ];
    }
}
