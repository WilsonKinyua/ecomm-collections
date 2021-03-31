<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSubSlideAdOneRequest;
use App\Http\Requests\UpdateSubSlideAdOneRequest;
use App\Http\Resources\Admin\SubSlideAdOneResource;
use App\Models\SubSlideAdOne;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubSlideAdOneApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_slide_ad_one_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubSlideAdOneResource(SubSlideAdOne::with(['product_category'])->get());
    }

    public function store(StoreSubSlideAdOneRequest $request)
    {
        $subSlideAdOne = SubSlideAdOne::create($request->all());

        if ($request->input('photo', false)) {
            $subSlideAdOne->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new SubSlideAdOneResource($subSlideAdOne))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubSlideAdOne $subSlideAdOne)
    {
        abort_if(Gate::denies('sub_slide_ad_one_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubSlideAdOneResource($subSlideAdOne->load(['product_category']));
    }

    public function update(UpdateSubSlideAdOneRequest $request, SubSlideAdOne $subSlideAdOne)
    {
        $subSlideAdOne->update($request->all());

        if ($request->input('photo', false)) {
            if (!$subSlideAdOne->photo || $request->input('photo') !== $subSlideAdOne->photo->file_name) {
                if ($subSlideAdOne->photo) {
                    $subSlideAdOne->photo->delete();
                }

                $subSlideAdOne->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($subSlideAdOne->photo) {
            $subSlideAdOne->photo->delete();
        }

        return (new SubSlideAdOneResource($subSlideAdOne))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubSlideAdOne $subSlideAdOne)
    {
        abort_if(Gate::denies('sub_slide_ad_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdOne->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
