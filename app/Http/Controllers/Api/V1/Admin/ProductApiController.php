<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['categories', 'tags'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('main_photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_photo'))))->toMediaCollection('main_photo');
        }

        if ($request->input('photo_1', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo_1'))))->toMediaCollection('photo_1');
        }

        if ($request->input('photo_2', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo_2'))))->toMediaCollection('photo_2');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['categories', 'tags']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('main_photo', false)) {
            if (!$product->main_photo || $request->input('main_photo') !== $product->main_photo->file_name) {
                if ($product->main_photo) {
                    $product->main_photo->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_photo'))))->toMediaCollection('main_photo');
            }
        } elseif ($product->main_photo) {
            $product->main_photo->delete();
        }

        if ($request->input('photo_1', false)) {
            if (!$product->photo_1 || $request->input('photo_1') !== $product->photo_1->file_name) {
                if ($product->photo_1) {
                    $product->photo_1->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo_1'))))->toMediaCollection('photo_1');
            }
        } elseif ($product->photo_1) {
            $product->photo_1->delete();
        }

        if ($request->input('photo_2', false)) {
            if (!$product->photo_2 || $request->input('photo_2') !== $product->photo_2->file_name) {
                if ($product->photo_2) {
                    $product->photo_2->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo_2'))))->toMediaCollection('photo_2');
            }
        } elseif ($product->photo_2) {
            $product->photo_2->delete();
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
