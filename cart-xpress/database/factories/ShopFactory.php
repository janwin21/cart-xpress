<?php

namespace Database\Factories;

use App\Models\Customers;
use App\Models\Shops;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Traits\UseUpload;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shops>
 */
class ShopFactory extends Factory
{
    use UseUpload;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shops::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $customers = Customers::all();

        return [
            'customerID' => $this->faker->numberBetween(1, $customers->count()),
            'name' => $this->faker->company(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'addressLine1' => $this->faker->streetAddress(),
            'addressLine2' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postalCode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'description' => $this->faker->text(125),
            'backgroundImagePath' => $this->unsplashImage($this->faker->numberBetween(1, 1000), 640, 480)
            //$this->faker->imageUrl(640, 480, null, true, 'Faker', true)
        ];
        
    }
}
