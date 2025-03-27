<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductComment;

class ProductCommentSeeder extends Seeder
{
    public function run(): void
    {
        ProductComment::factory()->count(50)->create();
    }
}
