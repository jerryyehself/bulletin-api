<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualityFactory extends Factory
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
            'acceptance_date' => $this->faker->dateTimeThisDecade(),
            'applier_id' => $this->faker->randomElement(User::pluck('user_id')),
            'component_id' => rand(1, 100),
            'counter' => rand(1, 100),
            'result' => $this->faker->boolean()
        ];
    }
}
