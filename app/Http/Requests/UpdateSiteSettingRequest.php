<?php

namespace App\Http\Requests;

use App\Models\SiteSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_setting_edit');
    }

    public function rules()
    {
        return [
            'title'           => [
                'string',
                'required',
            ],
            'caption'         => [
                'required',
            ],
            'open_hours'      => [
                'string',
                'required',
            ],
            'support_phone_1' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'support_phone_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'location'        => [
                'string',
                'required',
            ],
            'facebook'        => [
                'string',
                'required',
            ],
            'instagram'       => [
                'string',
                'nullable',
            ],
            'email'           => [
                'required',
            ],
            'whatsapp'        => [
                'string',
                'required',
            ],
        ];
    }
}
