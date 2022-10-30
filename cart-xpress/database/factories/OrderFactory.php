<?php

namespace Database\Factories;

use App\Models\Customers;
use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\orders>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $customers = Customers::all();
        $status = ['pending', 'delivered', 'cancelled'];

        return [
            'customerID' => $this->faker->numberBetween(1, $customers->count()),
            'orderedDate' => null,
            'requireDate' => null,
            'deliveredDate' => null,
            'reOrderedDate' => null,
            'status' => $this->faker->randomElement($status),
            'comment' => ''
        ];
    }
}
