<?php

namespace App\Http\Requests;

use App\Models\Subscribeduser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubscribeduserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subscribeduser_edit');
    }

    public function rules()
    {
        return [];
    }
}
