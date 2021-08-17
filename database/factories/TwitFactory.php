<?php

namespace Database\Factories;

use App\Models\Twit;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TwitFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Twit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition() {

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->text( 240 ),
            'parent_id' => ($this->faker->boolean(50) && Twit::count() > 0) ? Twit::all()->random()->id : null,
        ];

    }

}
