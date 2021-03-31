<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubSlideAdTwoRequest;
use App\Http\Requests\StoreSubSlideAdTwoRequest;
use App\Http\Requests\UpdateSubSlideAdTwoRequest;
use App\Models\ProductSubCategory;
use App\Models\SubSlideAdTwo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubSlideAdTwoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_slide_ad_two_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdTwos = SubSlideAdTwo::with(['product_category', 'media'])->get();

        return view('admin.subSlideAdTwos.index', compact('subSlideAdTwos'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_slide_ad_two_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subSlideAdTwos.create', compact('product_categories'));
    }

    public function store(StoreSubSlideAdTwoRequest $request)
    {
        $subSlideAdTwo = SubSlideAdTwo::create($request->all());

        if ($request->input('photo', false)) {
            $subSlideAdTwo->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $subSlideAdTwo->id]);
        }

        return redirect()->route('admin.sub-slide-ad-twos.index');
    }

    public function edit(SubSlideAdTwo $subSlideAdTwo)
    {
        abort_if(Gate::denies('sub_slide_ad_two_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subSlideAdTwo->load('product_category');

        return view('admin.subSlideAdTwos.edit', compact('product_categories', 'subSlideAdTwo'));
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

        return redirect()->route('admin.sub-slide-ad-twos.index');
    }

    public function show(SubSlideAdTwo $subSlideAdTwo)
    {
        abort_if(Gate::denies('sub_slide_ad_two_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdTwo->load('product_category');

        return view('admin.subSlideAdTwos.show', compact('subSlideAdTwo'));
    }

    public function destroy(SubSlideAdTwo $subSlideAdTwo)
    {
        abort_if(Gate::denies('sub_slide_ad_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdTwo->delete();

        return back();
    }

    public function massDestroy(MassDestroySubSlideAdTwoRequest $request)
    {
        SubSlideAdTwo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sub_slide_ad_two_create') && Gate::denies('sub_slide_ad_two_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SubSlideAdTwo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
