<?php

namespace App\Http\Requests;

use App\Models\Subscribeduser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubscribeduserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subscribeduser_create');
    }

    public function rules()
    {
        return [];
    }
}
