<?php

namespace App\Http\Requests;

use App\Models\ProductMainCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductMainCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_main_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:product_main_categories,name,' . request()->route('product_main_category')->id,
            ],
        ];
    }
}
