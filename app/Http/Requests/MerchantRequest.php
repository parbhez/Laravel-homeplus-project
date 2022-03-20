<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MerchantRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name'    => 'required',
            'email'        => 'required | email',
            'password'     => 'required',
            'mobile_no'    => 'required',
            'company_name' => 'required',
            'address'      => 'required',
        ];
    }
}
