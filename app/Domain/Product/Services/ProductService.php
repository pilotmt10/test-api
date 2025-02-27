<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Contracts\ProductServiceContract;
use App\Domain\Product\Models\Product;
use App\Domain\Product\Repository\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductService implements ProductServiceContract
{
    public function __construct(
        private ProductRepository $productRepository
    ) {}

    public function list(array $filters = []): Collection
    {
        return $this->productRepository->list($filters);
    }

    public function create(array $data): Product
    {
        return $this->productRepository->create($data);
    }

    public function update(int $id, array $fields): Product
    {
        $model = $this->productRepository->findById($id);

        if ($model === null) {
            throw new NotFoundHttpException('Товар не найден.');
        }

        $this->productRepository->update($model, $fields);

        return $model;
    }

    public function delete(int $id): void
    {
        $model = $this->productRepository->findById($id);

        if ($model === null) {
            throw new NotFoundHttpException('Товар не найден.');
        }

        $model->delete();
    }
}
