<?php

namespace App\Http\Requests;

use App\Models\Slide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSlideRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slide_create');
    }

    public function rules()
    {
        return [
            'product_category_id' => [
                'required',
                'integer',
            ],
            'photo'               => [
                'required',
            ],
        ];
    }
}
