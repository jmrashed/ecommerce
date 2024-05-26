<?php

namespace Database\Factories\Jmrashed\Ecommerce;

use Jmrashed\Ecommerce\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 1000), // Random price between 1 and 1000
            'quantity' => $this->faker->numberBetween(1, 100), // Random quantity between 1 and 100
            'image' => $this->faker->imageUrl(640, 480, 'technics'), // Random image URL
            'status' => $this->faker->randomElement(['available', 'unavailable']), // Random status
        ];
    }
}
