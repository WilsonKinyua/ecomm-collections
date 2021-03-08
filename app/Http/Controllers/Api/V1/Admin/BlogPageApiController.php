<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogPageRequest;
use App\Http\Requests\UpdateBlogPageRequest;
use App\Http\Resources\Admin\BlogPageResource;
use App\Models\BlogPage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogPageApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogPageResource(BlogPage::all());
    }

    public function store(StoreBlogPageRequest $request)
    {
        $blogPage = BlogPage::create($request->all());

        if ($request->input('photo', false)) {
            $blogPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new BlogPageResource($blogPage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BlogPage $blogPage)
    {
        abort_if(Gate::denies('blog_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogPageResource($blogPage);
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

        return (new BlogPageResource($blogPage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BlogPage $blogPage)
    {
        abort_if(Gate::denies('blog_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
