<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MerchantProductRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'merchant_id'              => 'required | numeric',
            'category_name_id'         => 'required | numeric',
            'sub_category_name_id'     => 'numeric',
            'sub_sub_category_name_id' => 'numeric',
            'product_name_bangla'      => 'required',
            'product_name_english'     => 'required',
            'product_details_en'       => 'required',
            'product_details_bn'       => 'required',
            //'product_slug'             => 'required',
            'product_market_price'     => 'required',
            'product_quantity'         => 'required',
            'product_discount'         => 'required',
            'product_sale_price'       => 'required',
            'image'                    => 'required',
        ];
    }
}
