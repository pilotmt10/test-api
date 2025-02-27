<?php

namespace App\Domain\Product\Contracts;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductServiceContract
{
    public function list(array $filters = []): Collection;

    public function create(array $data): Product;

    public function update(int $id, array $fields): Product;

    public function delete(int $id): void;
}
