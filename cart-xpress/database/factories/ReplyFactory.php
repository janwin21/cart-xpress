<?php

namespace Database\Factories;

use App\Models\Replies;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Replies>
 */
class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Replies::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all();
        $reviews = Reviews::all();

        return [
            'createdByID' => $this->faker->numberBetween(1, $users->count()), 
            'reviewID' => $this->faker->numberBetween(1, $reviews->count()), 
            'content' => $this->faker->text(50)
        ];
    }
}
