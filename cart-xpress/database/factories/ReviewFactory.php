<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reviews::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $users = User::all();
        $products = Products::all();

        return [
            'createdByID' => $this->faker->numberBetween(1, $users->count()), 
            'productID' => $this->faker->numberBetween(1, $products->count()), 
            'rating' => $this->faker->numberBetween(1, 5), 
            'content' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
