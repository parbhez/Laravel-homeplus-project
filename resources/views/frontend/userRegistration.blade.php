@extends('frontend.app')
@section('main_container')
    @include('frontend._partials.leftNavigation')
    <div class="row">
        <div class="col-md-8 col-sm-8">
            
            <!--Start Login-->
            <div class="row">
                <div class="col-md-offset-2 col-md-10" style="margin-top: 20px">
                    <div class="login_section_title">
                        <h2>
                            <i class="fa fa-user-plus"></i>
                            রেজিস্ট্রেশন (নতুন ইউজার)
                        </h2>
                    </div>
                    <div class="login_section">
                        @include('frontend.errors.messages')
                        @include('frontend.errors.ajaxMsg')
                        {!!Form::open(array('route'=>'frontendUserRegistration.post', 'id'=>'userRegistrationForm','id' => 'userRegistrationForm'))!!}
                        <div class="form-group">
                            <label for="FirstName">{{trans('frontend.name')}} *</label>
                            <input type="text" name="full_name" id="FirstName"
                                   class="form-control input-feild" autofocus="" required="" value="{{ old('full_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="Email">{{trans('frontend.email')}} *</label>
                            <input type="email" name="email" id="Email" class="form-control input-feild"
                                   required="" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="CreatePassword">{{trans('frontend.password')}} *</label>
                            <input type="password" name="password" id="CreatePassword" class="form-control input-feild" required="">
                        </div>
                        <div class="form-group">
                            <label for="Email">{{trans('frontend.mobile_no')}} *</label>
                            <input type="text" name="mobile_no" id="Mobile" class="form-control input-feild" required=""  data-inputmask='"mask": "99999-999999"' data-mask value="{{old('mobile_no')}}">
                        </div>
                        <div class="form-group">
                            <label for="Email">{{trans('frontend.gender')}} *</label>
                            <select name="gender" class="form-control input-feild">
                                <option selected disabled>Select Gender</option>
                                <option @if(old('gender') == 1) selected @endif value="1">Male</option>
                                <option @if(old('gender') == 2) selected @endif value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Email">{{trans('frontend.address')}} *</label>
                            <input type="text" name="address"  class="form-control input-feild" value="{{old('address')}}">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">{{trans('frontend.register')}}</button>
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
            $('#userRegistrationForms').validate({
                
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
                    },
                    gender: {
                        required: true
                    },
                    address: {
                        required: true
                    },
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
