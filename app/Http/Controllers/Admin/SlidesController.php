<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySlideRequest;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\ProductMainCategory;
use App\Models\Slide;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SlidesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slides = Slide::with(['product_category', 'media'])->get();

        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        abort_if(Gate::denies('slide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductMainCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.slides.create', compact('product_categories'));
    }

    public function store(StoreSlideRequest $request)
    {
        $slide = Slide::create($request->all());

        if ($request->input('photo', false)) {
            $slide->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $slide->id]);
        }

        return redirect()->route('admin.slides.index');
    }

    public function edit(Slide $slide)
    {
        abort_if(Gate::denies('slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductMainCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $slide->load('product_category');

        return view('admin.slides.edit', compact('product_categories', 'slide'));
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

        return redirect()->route('admin.slides.index');
    }

    public function show(Slide $slide)
    {
        abort_if(Gate::denies('slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide->load('product_category');

        return view('admin.slides.show', compact('slide'));
    }

    public function destroy(Slide $slide)
    {
        abort_if(Gate::denies('slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide->delete();

        return back();
    }

    public function massDestroy(MassDestroySlideRequest $request)
    {
        Slide::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('slide_create') && Gate::denies('slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Slide();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
