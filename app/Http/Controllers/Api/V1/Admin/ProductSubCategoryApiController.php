<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSubCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Http\Resources\Admin\ProductSubCategoryResource;
use App\Models\ProductSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSubCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductSubCategoryResource(ProductSubCategory::with(['main_category'])->get());
    }

    public function store(StoreProductSubCategoryRequest $request)
    {
        $productSubCategory = ProductSubCategory::create($request->all());

        return (new ProductSubCategoryResource($productSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductSubCategory $productSubCategory)
    {
        abort_if(Gate::denies('product_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductSubCategoryResource($productSubCategory->load(['main_category']));
    }

    public function update(UpdateProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {
        $productSubCategory->update($request->all());

        return (new ProductSubCategoryResource($productSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductSubCategory $productSubCategory)
    {
        abort_if(Gate::denies('product_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
