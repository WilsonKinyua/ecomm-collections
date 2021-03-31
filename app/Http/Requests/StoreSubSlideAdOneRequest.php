<?php

namespace App\Http\Requests;

use App\Models\SubSlideAdOne;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubSlideAdOneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_slide_ad_one_create');
    }

    public function rules()
    {
        return [
            'photo' => [
                'required',
            ],
        ];
    }
}
