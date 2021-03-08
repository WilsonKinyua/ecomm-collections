<?php

namespace App\Http\Requests;

use App\Models\BlogPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlogPageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('blog_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blog_pages,id',
        ];
    }
}
