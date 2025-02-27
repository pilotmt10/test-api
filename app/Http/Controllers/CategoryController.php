<?php

namespace App\Http\Controllers;

use App\Base\Responses\SuccessResponse;
use App\Domain\Category\Contracts\CategoryServiceContract;
use App\Domain\Category\Requests\CreateRequest;
use App\Domain\Category\Resources\CategoryItemResource;

class CategoryController extends Controller
{
    public function create(CreateRequest $request, CategoryServiceContract $service): array
    {
        $fields = $request->validated();
        return CategoryItemResource::make($service->create($fields))->toArray($request);
    }

    public function delete(int $id, CategoryServiceContract $service): array
    {
        $service->delete($id);
        return SuccessResponse::make();
    }
}
