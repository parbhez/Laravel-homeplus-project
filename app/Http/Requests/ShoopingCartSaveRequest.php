<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShoopingCartSaveRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address'        => 'required',
            'city_name_id'   => 'required | numeric',
        ];
    }
}
