<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductComment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductComment>
 */
class ProductCommentFactory extends Factory
{
    protected $model = ProductComment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Tạo user giả lập
            'product_id' => Product::factory(), // Tạo product giả lập
            'comment' => $this->faker->sentence(), // Sinh câu ngẫu nhiên
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
