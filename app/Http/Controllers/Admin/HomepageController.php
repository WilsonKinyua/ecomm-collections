<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHomepageRequest;
use App\Http\Requests\StoreHomepageRequest;
use App\Http\Requests\UpdateHomepageRequest;
use App\Models\Homepage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('homepage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepages = Homepage::with(['media'])->get();

        return view('admin.homepages.index', compact('homepages'));
    }

    public function create()
    {
        abort_if(Gate::denies('homepage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepages.create');
    }

    public function store(StoreHomepageRequest $request)
    {
        $homepage = Homepage::create($request->all());

        if ($request->input('logo', false)) {
            $homepage->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $homepage->id]);
        }

        return redirect()->route('admin.homepages.index');
    }

    public function edit(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepages.edit', compact('homepage'));
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

        return redirect()->route('admin.homepages.index');
    }

    public function show(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepages.show', compact('homepage'));
    }

    public function destroy(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepage->delete();

        return back();
    }

    public function massDestroy(MassDestroyHomepageRequest $request)
    {
        Homepage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('homepage_create') && Gate::denies('homepage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Homepage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
