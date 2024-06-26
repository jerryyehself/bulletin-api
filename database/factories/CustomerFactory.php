<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Traits\NewCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cust_name' => $this->faker->unique()->company,
            'cust_mail' => $this->faker->safeEmail,
            'cust_phone' => $this->faker->tollFreePhoneNumber,
            'cust_address' => $this->faker->streetAddress
        ];
    }
}
