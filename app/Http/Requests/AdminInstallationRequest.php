<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminInstallationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name'    => 'required',
            'address'         => 'address',
            'mobile_no'       => 'required',
            'company_slogan'  => 'required',
            'currency'        => 'required',
            'security_code'   => 'required',
            'company_logo'    => 'required',
            'language'        => 'required',
            'admin_email'     => 'required|email',
            'f_name'          => 'required',
            'l_name'          => 'required',
            'admin_mobile_no' => 'required',
            'address'         => 'required',
            'user_name'       => 'required',
            'password'        => 'required',
        ];
    }
}
