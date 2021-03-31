<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'customer_name'  => [
                'string',
                'required',
            ],
            'customer_phone' => [
                'string',
                'required',
            ],
            'product'        => [
                'string',
                'required',
            ],
            'quantity'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'product_price'  => [
                'required',
            ],
        ];
    }
}
