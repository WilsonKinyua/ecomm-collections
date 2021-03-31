<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Http\Resources\Admin\SlideResource;
use App\Models\Slide;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlidesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SlideResource(Slide::with(['product_category'])->get());
    }

    public function store(StoreSlideRequest $request)
    {
        $slide = Slide::create($request->all());

        if ($request->input('photo', false)) {
            $slide->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new SlideResource($slide))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Slide $slide)
    {
        abort_if(Gate::denies('slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SlideResource($slide->load(['product_category']));
    }

    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $slide->update($request->all());

        if ($request->input('photo', false)) {
            if (!$slide->photo || $request->input('photo') !== $slide->photo->file_name) {
                if ($slide->photo) {
                    $slide->photo->delete();
                }

                $slide->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($slide->photo) {
            $slide->photo->delete();
        }

        return (new SlideResource($slide))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Slide $slide)
    {
        abort_if(Gate::denies('slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
