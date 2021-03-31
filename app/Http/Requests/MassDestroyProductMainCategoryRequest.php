<?php

namespace App\Http\Requests;

use App\Models\ProductMainCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductMainCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_main_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_main_categories,id',
        ];
    }
}
