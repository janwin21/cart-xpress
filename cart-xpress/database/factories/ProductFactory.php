<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Shops;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $shops = Shops::all();
        $categories = Categories::all();

        $shopsID = $this->faker->numberBetween(1, $shops->count());
        $categoryID = $this->faker->numberBetween(1, $categories->count());
        $randomLetter = $this->faker->randomLetter();

        return [
            'shopID' => $shopsID,
            'categoryID' => $categoryID,
            'name' => 'Product ' . $randomLetter . ' ' . $shopsID . '/' . $categoryID,
            'size' => $this->faker->randomFloat(2, 1, 10000),
            'description' => $this->faker->text(100),
            'quantityInStock' => $this->faker->numberBetween(1, 150),
            'price' => $this->faker->randomFloat(2, 1, 10000),
            'discount' => $this->faker->numberBetween(0, 100) / 100,
            'durationOfDeliveryByHour' => $this->faker->randomFloat(2, 1, 500),
            'imagePath' => $this->faker->imageUrl(300, 580, null, true, 'Faker', false)
        ];
    }
}
