@extends('frontend.app')
@section('main_container')
    @include('frontend._partials.leftNavigation')
    <div class="row">
        <div class="col-md-8 col-sm-8">
            @include('frontend.errors.messages')
            @include('frontend.errors.ajaxMsg')
            <!--Start Login-->
            <div class="row">
                <div class="col-md-offset-2 col-md-10" style="margin-top: 20px">
                    <div class="login_section_title">
                        <h2>
                            <i class="fa fa-user-plus"></i>
                            পাসওয়ার্ড পরিবর্তন
                        </h2>
                    </div>
                    <div class="login_section">
                        {!!Form::open(array('route'=>'forgotePassword.post', 'id'=>'userRegistrationForm','id' => 'userRegistrationForm'))!!}
                        <div class="form-group">
                            <label for="Email">Enter Your Email Address *</label>
                            <input type="email" name="email" id="Email" class="form-control input-feild" required="">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Send Me a New Password</button>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>

            @if(Session::has('cartInfo'))

                <div class="row">
                    <div class="col-md-offset-2 col-md-10" style="margin-top: 30px">
                        <div class="cart_product_description">
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
                                @if(Session::has('cartInfo'))
                                    <?php $i = 1; ?>
                                    @foreach(Session::get('cartInfo') as $product)
                                        <tr>
                                            <td>
                                                <p>{{$i++}}</p>
                                            </td>
                                            <td>
                                                <img src="{{URL::to('public/images/product').'/'.$product->path}}" alt="">
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
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            <!--Start Login-->
        </div>
    </div>

    @include('frontend.shoppingCartAjaxRequest')
    {{ HTML::script('public/frontend/assets/js/input-mask/jquery.inputmask.js') }}
    {{ HTML::script('public/frontend/assets/js/input-mask/jquery.inputmask.extensions.js') }}
    
    <script type="text/javascript">
    $(function () {
        $("[data-mask]").inputmask();
    });
            $('#userRegistrationForm').validate({
                
                rules: {
                    full_name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    mobile_no: {
                        required: true
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        $('.alert').delay(1500).slideUp();
    </script>
</section>
</div>
</div>
@endsection
