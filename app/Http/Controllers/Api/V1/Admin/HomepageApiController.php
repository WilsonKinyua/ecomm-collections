<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHomepageRequest;
use App\Http\Requests\UpdateHomepageRequest;
use App\Http\Resources\Admin\HomepageResource;
use App\Models\Homepage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('homepage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomepageResource(Homepage::all());
    }

    public function store(StoreHomepageRequest $request)
    {
        $homepage = Homepage::create($request->all());

        if ($request->input('logo', false)) {
            $homepage->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new HomepageResource($homepage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomepageResource($homepage);
    }

    public function update(UpdateHomepageRequest $request, Homepage $homepage)
    {
        $homepage->update($request->all());

        if ($request->input('logo', false)) {
            if (!$homepage->logo || $request->input('logo') !== $homepage->logo->file_name) {
                if ($homepage->logo) {
                    $homepage->logo->delete();
                }

                $homepage->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($homepage->logo) {
            $homepage->logo->delete();
        }

        return (new HomepageResource($homepage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
