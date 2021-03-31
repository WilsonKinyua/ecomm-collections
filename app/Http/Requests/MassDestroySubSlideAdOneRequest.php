<?php

namespace App\Http\Requests;

use App\Models\SubSlideAdOne;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubSlideAdOneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub_slide_ad_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sub_slide_ad_ones,id',
        ];
    }
}
