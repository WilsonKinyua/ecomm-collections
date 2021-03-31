<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductMainCategoryRequest;
use App\Http\Requests\UpdateProductMainCategoryRequest;
use App\Http\Resources\Admin\ProductMainCategoryResource;
use App\Models\ProductMainCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductMainCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_main_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductMainCategoryResource(ProductMainCategory::all());
    }

    public function store(StoreProductMainCategoryRequest $request)
    {
        $productMainCategory = ProductMainCategory::create($request->all());

        return (new ProductMainCategoryResource($productMainCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductMainCategory $productMainCategory)
    {
        abort_if(Gate::denies('product_main_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductMainCategoryResource($productMainCategory);
    }

    public function update(UpdateProductMainCategoryRequest $request, ProductMainCategory $productMainCategory)
    {
        $productMainCategory->update($request->all());

        return (new ProductMainCategoryResource($productMainCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductMainCategory $productMainCategory)
    {
        abort_if(Gate::denies('product_main_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productMainCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
