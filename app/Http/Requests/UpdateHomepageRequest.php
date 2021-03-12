<?php

namespace App\Http\Requests;

use App\Models\Homepage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHomepageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('homepage_edit');
    }

    public function rules()
    {
        return [
            'name'              => [
                'string',
                'required',
            ],
            'short_description' => [
                'required',
            ],
            'phone'             => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'email'             => [
                'required',
            ],
            'address'           => [
                'string',
                'required',
            ],
            'working_days'      => [
                'string',
                'nullable',
            ],
            'facebook'          => [
                'string',
                'nullable',
            ],
            'twitter'           => [
                'string',
                'nullable',
            ],
            'instagram'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
