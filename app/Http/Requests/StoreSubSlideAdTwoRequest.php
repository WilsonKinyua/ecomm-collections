<?php

namespace App\Http\Requests;

use App\Models\SubSlideAdTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubSlideAdTwoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_slide_ad_two_create');
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
