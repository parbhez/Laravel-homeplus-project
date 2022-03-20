<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ColorRequest extends Request
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
            'color_name_lang1' => 'required',
            'color_name_lang2' => 'required',
            'color_code' => 'required'
        ];
    }
}
