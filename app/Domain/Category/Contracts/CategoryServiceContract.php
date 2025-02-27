<?php

namespace App\Domain\Category\Contracts;

use App\Domain\Category\Models\Category;

interface CategoryServiceContract
{
    public function create(array $data): Category;

    public function delete(int $id): void;
}
