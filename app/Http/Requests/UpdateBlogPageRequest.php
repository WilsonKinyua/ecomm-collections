<?php

namespace App\Http\Requests;

use App\Models\BlogPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_page_edit');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'required',
            ],
            'caption'     => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
