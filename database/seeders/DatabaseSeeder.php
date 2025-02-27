<?php

namespace Database\Seeders;

use App\Domain\Category\Models\Category;
use App\Domain\Product\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(10)->create();
        Product::factory(30)->create();
    }
}
