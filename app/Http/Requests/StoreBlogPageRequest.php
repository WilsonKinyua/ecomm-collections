<?php

namespace App\Http\Requests;

use App\Models\BlogPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlogPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_page_create');
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
            'photo'       => [
                'required',
            ],
        ];
    }
}
