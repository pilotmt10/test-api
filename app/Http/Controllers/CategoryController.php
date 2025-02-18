<?php

namespace App\Http\Controllers;

use App\Base\Responses\SuccessResponse;
use App\Domain\Category\Requests\CreateRequest;
use App\Domain\Category\Resources\CategoryItemResource;
use App\Domain\Category\Services\CategoryService;

class CategoryController extends Controller
{
    public function create(CreateRequest $request, CategoryService $service): array
    {
        $fields = $request->validated();
        return CategoryItemResource::make($service->create($fields))->toArray($request);
    }

    public function delete(int $id, CategoryService $service): array
    {
        $service->delete($id);
        return SuccessResponse::make();
    }
}
