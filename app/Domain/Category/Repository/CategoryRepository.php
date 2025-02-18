<?php

namespace App\Domain\Category\Repository;

use App\Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository
{
    public function create(array $fields): Category|Model
    {
        return Category::create($fields);
    }

    public function findById(int $id): Category|Model|null
    {
        return Category::query()
            ->where('id', $id)
            ->first();
    }
}
