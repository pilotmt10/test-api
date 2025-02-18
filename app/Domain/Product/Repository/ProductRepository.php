<?php

namespace App\Domain\Product\Repository;

use App\Base\Repository\Filters;
use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository
{
    use Filters;

    public function list(array $filters = []): Collection
    {
        $query = Product::query()->with('categories');

        $this->filter($query, $filters, 'name', 'like');
        $this->filter($query, $filters, 'categoryName', 'like', 'name', 'categories');
        $this->filter($query, $filters, 'priceFrom', '>=', 'price');
        $this->filter($query, $filters, 'priceTo', '<=', 'price');
        $this->filter($query, $filters, 'active', '=');

        return $query->get();
    }

    public function create(array $data): Product
    {
        $model = Product::create($data);

        if (isset($data['categories'])) {
            $model->categories()->attach($data['categories']);
        }

        return $model->load('categories');
    }

    public function update(Product $model, array $fields): Product
    {
        $model->update($fields);

        if (isset($fields['categories'])) {
            $model->categories()->sync($fields['categories']);
        }

        return $model->load('categories');
    }

    public function findById(int $id): Product|Model|null
    {
        return Product::query()
            ->where('id', $id)
            ->first();
    }
}
