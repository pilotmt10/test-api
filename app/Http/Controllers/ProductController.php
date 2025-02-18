<?php

namespace App\Http\Controllers;

use App\Base\Responses\SuccessResponse;
use App\Domain\Product\Requests\CreateRequest;
use App\Domain\Product\Requests\FiltersRequest;
use App\Domain\Product\Requests\UpdateRequest;
use App\Domain\Product\Resources\ProductItemResource;
use App\Domain\Product\Services\ProductService;

class ProductController extends Controller
{
    public function index(FiltersRequest $request, ProductService $service): array
    {
        $filters = $request->validated();
        return ProductItemResource::collection($service->list($filters))->toArray($request);
    }

    public function create(CreateRequest $request, ProductService $service): array
    {
        $fields = $request->validated();

        $model = $service->create($fields);
        return ProductItemResource::make($model)->toArray($request);
    }

    public function update(UpdateRequest $request, int $id, ProductService $service): array
    {
        $fields = $request->validated();

        $model = $service->update($id, $fields);
        return ProductItemResource::make($model)->toArray($request);
    }

    public function delete(int $id, ProductService $service): array
    {
        $service->delete($id);
        return SuccessResponse::make();
    }
}
