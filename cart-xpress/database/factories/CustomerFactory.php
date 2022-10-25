<?php

namespace Database\Factories;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $users = User::all();

        return [
            'userID' => $this->faker->unique()->numberBetween(1, $users->count()),
            'addressLine1' => $this->faker->streetAddress(),
            'addressLine2' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postalCode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'creditLimit' => $this->faker->numberBetween(150, 3500)
        ];
    }
}
