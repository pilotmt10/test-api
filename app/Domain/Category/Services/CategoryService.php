<?php

namespace App\Domain\Category\Services;

use App\Domain\Category\Models\Category;
use App\Domain\Category\Repository\CategoryRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {}

    public function create(array $fields): Category
    {
        return $this->categoryRepository->create($fields);
    }

    public function delete(int $id): void
    {
        $model = $this->categoryRepository->findById($id);

        if ($model === null) {
            throw new NotFoundHttpException('Категория не найдена.');
        }

        if ($model->products()->count() > 0) {
            throw new UnprocessableEntityHttpException('Вы не можете удалить эту категори, так как она закреплена за товаром.');
        }

        $model->delete();
    }
}
