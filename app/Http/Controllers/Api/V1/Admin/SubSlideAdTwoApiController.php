<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSubSlideAdTwoRequest;
use App\Http\Requests\UpdateSubSlideAdTwoRequest;
use App\Http\Resources\Admin\SubSlideAdTwoResource;
use App\Models\SubSlideAdTwo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubSlideAdTwoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_slide_ad_two_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubSlideAdTwoResource(SubSlideAdTwo::with(['product_category'])->get());
    }

    public function store(StoreSubSlideAdTwoRequest $request)
    {
        $subSlideAdTwo = SubSlideAdTwo::create($request->all());

        if ($request->input('photo', false)) {
            $subSlideAdTwo->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new SubSlideAdTwoResource($subSlideAdTwo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubSlideAdTwo $subSlideAdTwo)
    {
        abort_if(Gate::denies('sub_slide_ad_two_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubSlideAdTwoResource($subSlideAdTwo->load(['product_category']));
    }

    public function update(UpdateSubSlideAdTwoRequest $request, SubSlideAdTwo $subSlideAdTwo)
    {
        $subSlideAdTwo->update($request->all());

        if ($request->input('photo', false)) {
            if (!$subSlideAdTwo->photo || $request->input('photo') !== $subSlideAdTwo->photo->file_name) {
                if ($subSlideAdTwo->photo) {
                    $subSlideAdTwo->photo->delete();
                }

                $subSlideAdTwo->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($subSlideAdTwo->photo) {
            $subSlideAdTwo->photo->delete();
        }

        return (new SubSlideAdTwoResource($subSlideAdTwo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubSlideAdTwo $subSlideAdTwo)
    {
        abort_if(Gate::denies('sub_slide_ad_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdTwo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
