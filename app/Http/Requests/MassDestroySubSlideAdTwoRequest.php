<?php

namespace App\Http\Requests;

use App\Models\SubSlideAdTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubSlideAdTwoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub_slide_ad_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sub_slide_ad_twos,id',
        ];
    }
}
