<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'category_name_id'             => 'required | numeric',
            'sub_category_name_id'         => 'required | numeric',
            'sub_category_details_name_id' => 'required | numeric',
            'brand_name_id'                => 'required | numeric',
            'product_name_lng2'            => 'required',
            'title_lng1'                   => 'required',
            'title_lng2'                   => 'required',
            'features_lng1'                => 'required',
            'features_lng2'                => 'required',
            'supports_lng1'                => 'required',
            'supports_lng2'                => 'required',
            'amount'                       => 'required',
            'available'                    => 'required ',
            'tag_name_id'                  => 'required | array',
            'image'                        => 'required',
        ];
    }
}
