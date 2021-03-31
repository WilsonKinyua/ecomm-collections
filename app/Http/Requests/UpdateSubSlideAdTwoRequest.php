<?php

namespace App\Http\Requests;

use App\Models\SubSlideAdTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubSlideAdTwoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_slide_ad_two_edit');
    }

    public function rules()
    {
        return [];
    }
}
