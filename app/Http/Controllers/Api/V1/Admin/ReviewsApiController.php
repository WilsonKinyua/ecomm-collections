<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReviewResource;
use App\Models\Review;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReviewResource(Review::all());
    }

    public function show(Review $review)
    {
        abort_if(Gate::denies('review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReviewResource($review);
    }

    public function destroy(Review $review)
    {
        abort_if(Gate::denies('review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $review->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
