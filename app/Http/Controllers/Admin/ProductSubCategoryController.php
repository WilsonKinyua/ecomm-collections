<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductSubCategoryRequest;
use App\Http\Requests\StoreProductSubCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Models\ProductMainCategory;
use App\Models\ProductSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSubCategories = ProductSubCategory::with(['main_category'])->get();

        return view('admin.productSubCategories.index', compact('productSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_categories = ProductMainCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productSubCategories.create', compact('main_categories'));
    }

    public function store(StoreProductSubCategoryRequest $request)
    {
        $productSubCategory = ProductSubCategory::create($request->all());

        return redirect()->route('admin.product-sub-categories.index');
    }

    public function edit(ProductSubCategory $productSubCategory)
    {
        abort_if(Gate::denies('product_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_categories = ProductMainCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productSubCategory->load('main_category');

        return view('admin.productSubCategories.edit', compact('main_categories', 'productSubCategory'));
    }

    public function update(UpdateProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {
        $productSubCategory->update($request->all());

        return redirect()->route('admin.product-sub-categories.index');
    }

    public function show(ProductSubCategory $productSubCategory)
    {
        abort_if(Gate::denies('product_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSubCategory->load('main_category');

        return view('admin.productSubCategories.show', compact('productSubCategory'));
    }

    public function destroy(ProductSubCategory $productSubCategory)
    {
        abort_if(Gate::denies('product_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductSubCategoryRequest $request)
    {
        ProductSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
