<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), 
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'view' => $this->faker->numberBetween(0, 1000),
            'cate_id' => Category::inRandomOrder()->first()->id ?? Category::factory(), 
        ];
    }
}
