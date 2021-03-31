<?php

namespace App\Http\Requests;

use App\Models\ProductMainCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductMainCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_main_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:product_main_categories',
            ],
        ];
    }
}
