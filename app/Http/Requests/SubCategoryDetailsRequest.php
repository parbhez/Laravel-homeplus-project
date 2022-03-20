<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubCategoryDetailsRequest extends Request
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
            'sub_category_name_id'     => 'required',
            'sub_category_details_lng1' => 'required',
            'sub_category_details_lng2' => 'required',       
             ];
    }
}
