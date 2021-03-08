<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlogPageRequest;
use App\Http\Requests\StoreBlogPageRequest;
use App\Http\Requests\UpdateBlogPageRequest;
use App\Models\BlogPage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BlogPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPages = BlogPage::with(['media'])->get();

        return view('admin.blogPages.index', compact('blogPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogPages.create');
    }

    public function store(StoreBlogPageRequest $request)
    {
        $blogPage = BlogPage::create($request->all());

        if ($request->input('photo', false)) {
            $blogPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $blogPage->id]);
        }

        return redirect()->route('admin.blog-pages.index');
    }

    public function edit(BlogPage $blogPage)
    {
        abort_if(Gate::denies('blog_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogPages.edit', compact('blogPage'));
    }

    public function update(UpdateBlogPageRequest $request, BlogPage $blogPage)
    {
        $blogPage->update($request->all());

        if ($request->input('photo', false)) {
            if (!$blogPage->photo || $request->input('photo') !== $blogPage->photo->file_name) {
                if ($blogPage->photo) {
                    $blogPage->photo->delete();
                }

                $blogPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($blogPage->photo) {
            $blogPage->photo->delete();
        }

        return redirect()->route('admin.blog-pages.index');
    }

    public function show(BlogPage $blogPage)
    {
        abort_if(Gate::denies('blog_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogPages.show', compact('blogPage'));
    }

    public function destroy(BlogPage $blogPage)
    {
        abort_if(Gate::denies('blog_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogPageRequest $request)
    {
        BlogPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('blog_page_create') && Gate::denies('blog_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BlogPage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
