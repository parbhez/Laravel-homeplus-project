@extends('frontend.singleProductApp')
@section('main_container')
@if(isset($product))

<section class="preview_and_purchase">
    <div class="container">
        <div class="row">
        @if($product == false)
            <div class="alert alert-danger text-center" style="padding:10px;font-size:24px;"> This Product is Not Available Now, Please See Related Product....!!</div>
        @else
            <div class="col-md-6">
                <div class="product_preivew">

                    <div class="product_preivew_container">
                        <a href="{{URL::to('public/images/product')}}/{{$product->path}}" class="MagicZoom"
                           id="motorbike">
                            <img src="{{URL::to('public/images/product')}}/{{$product->path}}">
                        </a>
                    </div>

                    <div class="product_preivew_list">
                        @foreach($product->productImages as $productImage)
                            <a data-zoom-id="motorbike"
                                href="{{URL::to('public/images/product')}}/{{$productImage->path}}"
                                data-image="{{URL::to('public/images/product')}}/{{$productImage->path}}">
                                <img src="{{URL::to('public/images/product')}}/{{$productImage->path}}">
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-md-5">
                <div class="product_purchase">
                    <h2>@if(Session::get('frontend_lang') == 1)
                            {{$product->product_name_lang1}}
                        @else
                            {{$product->product_name_lang2}}
                        @endif
                    </h2>
                    <div class="product_purchase_container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="product_price">
                                    <h1>
                                        @if(Session::get('frontend_lang') == 1) Tk {{$product->sale_price}} @else ৳ {{App\Http\Helper::bnNum($product->sale_price)}} @endif
                                    </h1>
                                    <p class="previous_price">
                                        <span>@if(Session::get('frontend_lang') == 1) {{trans('frontend.prev_price')}} @else {{trans('frontend.prev_price')}} @endif:&nbsp;&nbsp;
                                            <s>@if(Session::get('frontend_lang') == 1) Tk {{$product->market_price}} @else ৳ {{App\Http\Helper::bnNum($product->market_price)}} @endif</s>
                                        </span>
                                    </p>
                                    <p class="dill_code">
                                        <span>@if(Session::get('frontend_lang') == 1) {{trans('frontend.shopping_code')}} @else {{trans('frontend.shopping_code')}} @endif:&nbsp;&nbsp;
                                            @if(Session::get('frontend_lang') == 1) {{$product->product_code}} @else {{App\Http\Helper::bnNum($product->product_code)}} @endif
                                        </span>
                                    </p>

                                </div>
                                <div class="product_quantity">
                                    <div class="sizeDiv">
                                        @if(count($product->productSizes) > 0)
                                            <p>@if(Session::get('frontend_lang') == 1) {{trans('frontend.size')}} @else {{trans('frontend.size')}} @endif</p>
                                            @foreach($product->productSizes as $productSize)
                                                <input id="size_{{$productSize->product_wise_size_id}}" class="product-size" name="item_size" type="radio"
                                                       value="{{$productSize->product_wise_size_id}}">
                                                <label id="labelForSize_{{$productSize->product_wise_size_id}}" for="size_{{$productSize->product_wise_size_id}}">
                                                    @if(Session::get('frontend_lang') == 1) {{$productSize->size_title_lang1}} @else {{ $productSize->size_title_lang2 }} @endif
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="colorDiv">
                                        @if(count($product->productColors) > 0)
                                            <br><p>@if(Session::get('frontend_lang') == 1) {{trans('frontend.color')}} @else {{trans('frontend.color')}} @endif</p>
                                            @foreach($product->productColors as $productColor)
                                                <input class="product-color" id="color_{{$productColor->product_wise_color_id}}" name="item_color" type="radio"
                                                       value="{{$productColor->product_wise_color_id}}">
                                                <label id="labelForColor_{{$productColor->product_wise_color_id}}" for="color_{{$productColor->product_wise_color_id}}">
                                                    @if(Session::get('frontend_lang') == 1) {{$productColor->color_name_lang1}} @else {{ $productColor->color_name_lang2 }} @endif
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="product_add_to_cart">
                                    <button class="btn btn-success add-to-cart">
                                        <i class="fa fa-cart-plus"></i>
                                        @if(Session::get('frontend_lang') == 1) {{trans('frontend.add_to_cart')}} @else {{trans('frontend.add_to_cart')}} @endif
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                    <a href="{{URL::to('checkout')}}" class="btn btn-success order_now" data-status="1">
                                        @if(Session::get('frontend_lang') == 1) {{trans('frontend.order_now')}} @else {{trans('frontend.order_now')}} @endif
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div style="padding-top: 10px;font-size: 21px;">
                    {{trans('frontend.call_for_order')}}
                    <strong style="color: darkviolet">
                        <span>
                            <span class="fa fa-phone"></span>
                            @if(Session::get('frontend_lang') == 1) 
                                01633-666 222 
                            @else 
                                {{App\Http\Helper::bnNum('01633-666 222') }}
                            @endif
                        </span>
                        <br>
                        <span style="padding-left: 145px;">
                            <span class="fa fa-phone"></span>
                            @if(Session::get('frontend_lang') == 1) 
                                01978-667 222 
                            @else 
                                {{App\Http\Helper::bnNum('01978-667 222') }}
                            @endif
                        </span>                    
                    </strong>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Close Product Preview and Purchase -->


<!--Start Product Description -->
<section class="product_description">
    <div class="container">

        <div class="product_des_section_title">
            <h2>
                <i class="fa fa-tag"></i>
                @if(Session::get('frontend_lang') == 1) {{trans('frontend.product_details')}} @else {{trans('frontend.product_details')}} @endif
            </h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="product_description_list">
                    <ul>
                        <?php
                        if (Session::get('frontend_lang') == 1) {
                             $details = explode('#', $product->details_lang1);
                        }else{
                             $details = explode('#', $product->details_lang2);
                        }
                       
                        ?>
                        @foreach($details as $details)
                            <li>{{$details}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- <div class="col-md-4">
                <div class="about_buyer">
                    <h2>
                        <i class="fa fa-user"></i>
                        @if(Session::get('frontend_lang') == 1) {{trans('frontend.saler')}} @else {{trans('frontend.saler')}} @endif
                    </h2>
                    <h3>
                        <a href="{{URL::to('merchantAllProducts')}}/{{$product->merchantInformation->merchantId}}" target="_blank">
                            <i class="fa fa-bars"></i>
                            {{$product->merchantInformation->company_name}} ({{$product->merchantTotalProduct}})
                        </a>
                    </h3>

                    <div class="delivery_charge">
                        <p>@if(Session::get('frontend_lang') == 1) {{trans('frontend.delevery_charge')}} @else {{trans('frontend.delevery_charge')}} @endif</p>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td></td>
                                <td>@if(Session::get('frontend_lang') == 1) {{trans('frontend.dhaka')}} @else {{trans('frontend.dhaka')}} @endif</td>
                                <td>@if(Session::get('frontend_lang') == 1) {{trans('frontend.out_side_dhaka')}} @else {{trans('frontend.out_side_dhaka')}} @endif</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>@if(Session::get('frontend_lang') == 1) {{trans('frontend.charge')}} @else {{trans('frontend.charge')}} @endif</td>
                                <td>@if(Session::get('frontend_lang') == 1) Tk 50 @else ৳ ৫০ @endif</td>
                                <td>@if(Session::get('frontend_lang') == 1) Tk 90 @else ৳ ৯০ @endif</td>
                            </tr>
                            <tr>
                                <td>@if(Session::get('frontend_lang') == 1) {{trans('frontend.speed')}} @else {{trans('frontend.speed')}} @endif</td>
                                <td>@if(Session::get('frontend_lang') == 1) 1 Day @else ১ দিন @endif</td>
                                <td>@if(Session::get('frontend_lang') == 1) 3 Days @else ৩ দিন @endif</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div> --}}


        </div>
    </div>
</section>
<!--Close Product Description -->

<script type="text/javascript">
    var product_id   = "{{$product->product_id}}";
</script>
@include('frontend.shoppingCartAjaxRequest')
@endif
@endif

<!--Start Related Product -->
@if(count($relatedProducts) > 0)
<section class="related_porduct_section">
    <div class="container">
        <div class="related_porduct_title">
            <h2>{{trans('frontend.related_product')}}</h2>
        </div>
        <div class="row">
            
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-2">
                        <div class="single_related_product">
                            <a href="{{ URL::to('product-details').'/'.$relatedProduct->product_id.'/'.$relatedProduct->slug}}" target="_blank">
                                <img src="{{URL::to('public/images/product')}}/{{$relatedProduct->path}}" alt="">
                                <div class="related_porduct_price">
                                    <p>
                                        @if(Session::get('frontend_lang') == 1) Tk {{$relatedProduct->sale_price}} @else ৳ {{App\Http\Helper::bnNum($product->sale_price)}}  @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            
        </div>
    </div>
</section>
@endif
@if(count($mostSaleProducts) > 0)
    <section class="related_porduct_section">
        <div class="container">
            <div class="related_porduct_title">
                <h2>{{trans('frontend.most_sale_product')}}</h2>
            </div>
            <div class="row">
                @foreach($mostSaleProducts as $mostSaleProduct)
                    <div class="col-md-2">
                        <div class="single_related_product">
                            <a href="{{ URL::to('product-details').'/'.$mostSaleProduct->product_id.'/'.$mostSaleProduct->slug}}" target="_blank">
                                <img src="{{URL::to('public/images/product')}}/{{$mostSaleProduct->path}}" alt="">
                                <div class="related_porduct_price">
                                    <p>
                                        @if(Session::get('frontend_lang') == 1) Tk {{$mostSaleProduct->sale_price}} @else ৳ {{App\Http\Helper::bnNum($product->sale_price)}}  @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif


@endsection

