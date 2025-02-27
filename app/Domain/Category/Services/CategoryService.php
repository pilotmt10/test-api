<?php

namespace App\Domain\Category\Services;

use App\Domain\Category\Contracts\CategoryServiceContract;
use App\Domain\Category\Models\Category;
use App\Domain\Category\Repository\CategoryRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class CategoryService implements CategoryServiceContract
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {}

    public function create(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }

    public function delete(int $id): void
    {
        $model = $this->categoryRepository->findById($id);

        if ($model === null) {
            throw new NotFoundHttpException('Категория не найдена.');
        }

        if ($model->products()->count() > 0) {
            throw new UnprocessableEntityHttpException('Вы не можете удалить эту категорию, так как она закреплена за товаром.');
        }

        $model->delete();
    }
}
