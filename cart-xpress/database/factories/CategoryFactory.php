<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Traits\UseUpload;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoryFactory extends Factory
{
    use UseUpload;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categories::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->domainWord(),
            'description' => $this->faker->text(125),
            'backgroundImagePath' => $this->unsplashImage($this->faker->numberBetween(1, 1000), 640, 480)
            //$this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true)
        ];
    }
}
