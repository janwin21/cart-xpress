<?php

namespace Database\Factories;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetails>
 */
class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $orders = Orders::all();
        $products = Products::all();

        return [
            'orderID' => $this->faker->numberBetween(1, $orders->count()),
            'productID' => $this->faker->numberBetween(1, $products->count()),
            'quantityOrdered' => $this->faker->numberBetween(1, 500),
            'miscellaneousFee' => 0
        ];
    }
}
