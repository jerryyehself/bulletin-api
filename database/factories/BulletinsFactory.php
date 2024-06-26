<?php

namespace Database\Factories;

use App\Models\Bulletins;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BulletinsFactory extends Factory
{

    protected $model = Bulletins::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $model = Bulletins::$bulletSys[rand(0, 1)];

        $bulletPosts = $model['sys']::select(array_merge($model['fields'], ['num', 'applier_id']))
            ->whereNotIn(
                'num',
                Bulletins::pluck('num')->toArray()
            )
            ->get()
            ->toArray();

        $bulletSys = $this->faker->unique()->randomElement($bulletPosts);

        return [
            'num' => $bulletSys['num'],
            // 'closed_by' => auth()->user()->user_id,
            'closed_by' => $this->faker->randomElement(User::pluck('user_id')),
            'limit_date' => $bulletSys['limit_date'],
            'title' => $bulletSys['title'],
            'abstract' => Str::limit($bulletSys['abstract'], 20),
            'closed_date' => $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}
