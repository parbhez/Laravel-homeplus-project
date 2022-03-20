<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th>{{trans('frontend.product_name')}} </th>
                <td>
                    @if(Session::get('frontend_lang') == 1) {{$product->product_name_lang1}} @else {{$product->product_name_lang2}} @endif
                </td>
            </tr>
            <tr>
                <th>{{trans('frontend.order_date')}} </th>
                <td>
                    @if(Session::get('frontend_lang') == 1) {{$product->order_date}} @else {{App\Http\Helper::bnNum($product->order_date)}} @endif
                </td>
            </tr>
            <tr>
                <th>{{trans('frontend.sale_price')}} </th>
                <td>
                    @if(Session::get('frontend_lang') == 1) {{$product->sale_price}} @else {{App\Http\Helper::bnNum($product->sale_price)}} @endif
                </td>
            </tr>
            <tr>
                <th>{{trans('frontend.shipping_cost')}} </th>
                <td>
                    @if(Session::get('frontend_lang') == 1) {{$product->shipping_cost}} @else {{App\Http\Helper::bnNum($product->shipping_cost)}} @endif
                </td>
            </tr>
            <tr>
                <th>{{trans('frontend.total_amount')}} </th>
                <td>
                    @if(Session::get('frontend_lang') == 1) {{$product->sale_price + $product->shipping_cost}} @else {{App\Http\Helper::bnNum($product->sale_price + $product->shipping_cost)}} @endif
                </td>
            </tr>
        </table>
    </div>
    {{--<div class="col-md-12">
        <label>{{trans('frontend.customer_details')}} </label>
        <div style="border: 1px solid gray">
            <table class="table table-bordered">
                <tr>
                    <th> {{trans('frontend.name')}} </th>
                    <td> {{$product->full_name}} </td>
                </tr>
                <tr>
                    <th>{{trans('frontend.mobile_no')}} </th>
                    <td>
                        @if(Session::get('frontend_lang') == 1) {{$product->shipping_mobile_no}} @else {{App\Http\Helper::bnNum($product->shipping_mobile_no)}} @endif
                    </td>
                </tr>
                <tr>
                    <th>{{trans('frontend.address')}} </th>
                    <td>
                        {{$product->address}}
                    </td>
                </tr>
            </table>
        </div>
    </div>--}}
</div>