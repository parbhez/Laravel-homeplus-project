@extends('frontend.app')
@section('main_container')
    @include('frontend._partials.leftNavigation')
    <div class="row">
        <div class="col-md-7 col-sm-7">
            @include('frontend.errors.messages')
            @include('frontend.errors.ajaxMsg')

            <?php $i = 1; $subTotal = 0; ?>
            @if(Session::has('cartInfo'))
            <div class="cart_product_description" style="margin-top: 20px">
                <div class="login_section_title">
                    <h2>
                        <i class="fa fa-shopping-cart"></i>
                        {{trans('frontend.cart_title')}}
                    </h2>
                </div>

                <table class="table table-bordered table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>
                            <p>{{trans('frontend.sl_no')}}</p>
                        </th>
                        <th>
                            <p>{{trans('frontend.image')}}</p>
                        </th>
                        <th>
                            <p>{{trans('frontend.product_detail')}}</p>
                        </th>
                        <th>
                            <p>{{trans('frontend.size_color')}}</p>
                        </th>
                        <th>
                            <p>{{trans('frontend.quantity')}}</p>
                        </th>
                        <th>
                            <p>{{trans('frontend.unit_price')}}</p>
                        </th>
                        <th>
                            <p>{{trans('frontend.total_price')}}</p>
                        </th>
                        <th><p><i class="fa fa-remove"></i></p></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach(Session::get('cartInfo') as $product)
                            <tr  style="height: 20px">
                                <td>
                                    <p>{{$i++}}</p>
                                </td>
                                <td>
                                    <img src="{{URL::to('public/images/product').'/'.$product->path}}">
                                </td>
                                <td>
                                    <h2>@if(Session::get('frontend_lang') == 1) {{$product->product_name_lang1}} @else {{$product->product_name_lang2}} @endif</h2>
                                    <p>
                                        Shopping Code:@if(Session::get('frontend_lang') == 1){{$product->product_code}}@else {{App\Http\Helper::bnNum($product->product_code)}}  @endif
                                    </p>
                                </td>
                                <td>
                                    <p>@if(Session::get('frontend_lang') == 1){{$product->color_name_lang1 .' / '. $product->size_title_lang1}}@else {{$product->color_name_lang2 .' / '. $product->size_title_lang2}} @endif</p>
                                </td>
                                <td>
                                    <input value="{{$product->product_id}}" type="hidden" name="product_id" id="productId_{{$product->cart_item_id}}">
                                    <input class="text-center quantity" value="{{$product->quantity}}" type="text" name="quanitty" id="quanitty_{{$product->cart_item_id}}" style="margin-top:15px;text-align: center">
                                </td>
                                <td>
                                    <p id="unitPrice_{{$product->cart_item_id}}">@if(Session::get('frontend_lang') == 1){{$product->sale_price}}@else {{App\Http\Helper::bnNum($product->sale_price)}}  @endif</p>
                                </td>
                                <td>
                                    <p id="toalPrice_{{$product->cart_item_id}}">@if(Session::get('frontend_lang') == 1){{$product->sale_price * $product->quantity}}@else {{App\Http\Helper::bnNum($product->sale_price * $product->quantity)}}  @endif</p>
                                </td>
                                <td>
                                    <p>
                                        <i class="fa fa-trash-o cart_quantity_delete" id="productDelete_{{$product->cart_item_id}}"></i>
                                    </p>
                                </td>
                            </tr>
                            <?php $subTotal += $product->sale_price * $product->quantity; ?>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-left:400px;padding: 10px;">
                    <table>
                        <tr>
                            <td><b> Sub Total Amount </b></td>
                            <td><label class="sub_total"> {{$subTotal}} </label></td>
                        </tr>
                        <tr>
                            <td><b> Shoping Cost </b></td>
                            <td><label class="shipment_cost"> 0 </label></td>
                        </tr>
                        <tr>
                            <td><b> Total Amount </b></td>
                            <td><label class="net_total"> {{$subTotal}} </label></td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif

            <!--Start Delivery section-->

            @if(Session::has('cartInfo'))
            <div class="login_section_title" style="margin-top: 20px">
                <h2>
                    <i class="fa fa-truck"></i>
                    {{trans('frontend.save_shopping')}}
                </h2>
            </div>
            <div class="login_section">
                {!! Form::open(['route' => 'saveShoppingCartItem','id' => 'product-order-form']) !!}
                    <p><b> {{trans('frontend.delivery_hints')}}</b></p>
                    <br>
                    <div class="form-group">
                        <label for="mobile">{{trans('frontend.mobile_no')}}</label>
                        <input type="hidden" name="shipping_cost" id="shipment_cost" value="0">
                        <input type="text" class="form-control" name="mobile_no"  data-inputmask='"mask": "(+880) 9999-999999"' data-mask>
                    </div>
                    <div class="form-group">
                        <label for="address">{{trans('frontend.delivery_address')}}</label>
                        <textarea class="form-control" rows="5" name="address" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="district">{{trans('frontend.city_name')}}</label>
                        <select class="form-control" name="city_name_id" id="city-select">
                            <option selected="selected" disabled>আমার অবস্থানটি হলো</option>
                            @if(isset($cities))
                                @foreach($cities as $citie)
                                    <option value="{{$citie->id}}" data-cost="{{$citie->cost}}">@if(Session::get('frontend_lang') == 1) {{$citie->city_name_lang1}} @else {{$citie->city_name_lang2}}  @endif</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        {{trans('frontend.save_shopping')}}
                    </button>
                {!! Form::close() !!}
            </div>
            @else
                <p style="color: orange;padding-top: 20px;text-align: center"><b>Thre Have No Product In Cart.<b/></p>
            @endif
            <!--End Delivery Section-->
        </div>
    </div>

    @include('frontend.shoppingCartAjaxRequest')
    {{ HTML::script('public/frontend/assets/js/input-mask/jquery.inputmask.js') }}
    {{ HTML::script('public/frontend/assets/js/input-mask/jquery.inputmask.extensions.js') }}

    <script type="text/javascript">
        $(function () {
            $("[data-mask]").inputmask();
        });

        $('#product-order-form').validate({
            onkeyup: false,
            rules: {
                mobile_no: {
                    required : true,
                },
                address: {
                    required: true
                },
                city_name_id: {
                    required: true
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.alert').delay(1500).slideUp();

        $(document).ready(function () {
            var subTotal = "{{$subTotal}}";
            $('.sub_total').html(subTotal);
            var shippingCost = parseFloat($('.shipment_cost').html());
            $('.net_total').html(parseFloat(subTotal) + parseFloat(shippingCost));
        });

        $('#city-select').on('change',function (e) {
            if ($('.net_total').html() == 0) {
                return false;
            }
            var city_id = e.target.value;
            var city_wise_cost = $('option:selected', this).attr('data-cost');
            var subTotal = "{{$subTotal}}";

            $("#shipment_cost").val(city_wise_cost);
            $(".shipment_cost").html(city_wise_cost);
            var shippingCost = parseFloat($('.shipment_cost').html());
            $('.net_total').html(parseFloat(subTotal) + parseFloat(shippingCost));
        });
    </script>

</section>
</div>
</div>
@endsection
