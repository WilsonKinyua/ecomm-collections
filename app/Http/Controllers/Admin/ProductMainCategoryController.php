<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductMainCategoryRequest;
use App\Http\Requests\StoreProductMainCategoryRequest;
use App\Http\Requests\UpdateProductMainCategoryRequest;
use App\Models\ProductMainCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductMainCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_main_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productMainCategories = ProductMainCategory::all();

        return view('admin.productMainCategories.index', compact('productMainCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_main_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productMainCategories.create');
    }

    public function store(StoreProductMainCategoryRequest $request)
    {
        $productMainCategory = ProductMainCategory::create($request->all());

        return redirect()->route('admin.product-main-categories.index');
    }

    public function edit(ProductMainCategory $productMainCategory)
    {
        abort_if(Gate::denies('product_main_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productMainCategories.edit', compact('productMainCategory'));
    }

    public function update(UpdateProductMainCategoryRequest $request, ProductMainCategory $productMainCategory)
    {
        $productMainCategory->update($request->all());

        return redirect()->route('admin.product-main-categories.index');
    }

    public function show(ProductMainCategory $productMainCategory)
    {
        abort_if(Gate::denies('product_main_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productMainCategories.show', compact('productMainCategory'));
    }

    public function destroy(ProductMainCategory $productMainCategory)
    {
        abort_if(Gate::denies('product_main_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productMainCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductMainCategoryRequest $request)
    {
        ProductMainCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
