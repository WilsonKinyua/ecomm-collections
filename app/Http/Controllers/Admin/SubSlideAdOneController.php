<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubSlideAdOneRequest;
use App\Http\Requests\StoreSubSlideAdOneRequest;
use App\Http\Requests\UpdateSubSlideAdOneRequest;
use App\Models\ProductSubCategory;
use App\Models\SubSlideAdOne;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubSlideAdOneController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_slide_ad_one_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdOnes = SubSlideAdOne::with(['product_category', 'media'])->get();

        return view('admin.subSlideAdOnes.index', compact('subSlideAdOnes'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_slide_ad_one_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subSlideAdOnes.create', compact('product_categories'));
    }

    public function store(StoreSubSlideAdOneRequest $request)
    {
        $subSlideAdOne = SubSlideAdOne::create($request->all());

        if ($request->input('photo', false)) {
            $subSlideAdOne->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $subSlideAdOne->id]);
        }

        return redirect()->route('admin.sub-slide-ad-ones.index');
    }

    public function edit(SubSlideAdOne $subSlideAdOne)
    {
        abort_if(Gate::denies('sub_slide_ad_one_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_categories = ProductSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subSlideAdOne->load('product_category');

        return view('admin.subSlideAdOnes.edit', compact('product_categories', 'subSlideAdOne'));
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

        return redirect()->route('admin.sub-slide-ad-ones.index');
    }

    public function show(SubSlideAdOne $subSlideAdOne)
    {
        abort_if(Gate::denies('sub_slide_ad_one_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdOne->load('product_category');

        return view('admin.subSlideAdOnes.show', compact('subSlideAdOne'));
    }

    public function destroy(SubSlideAdOne $subSlideAdOne)
    {
        abort_if(Gate::denies('sub_slide_ad_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subSlideAdOne->delete();

        return back();
    }

    public function massDestroy(MassDestroySubSlideAdOneRequest $request)
    {
        SubSlideAdOne::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sub_slide_ad_one_create') && Gate::denies('sub_slide_ad_one_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SubSlideAdOne();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
