@extends('merchantProductPanel.app')
@section('content')
<?php $lang= session::get('frontend_lang'); $i=0; ?>
    <div class="pricebar">
        <h2>{{trans('merchant.price')}}</h2>

        <div class="pricing_list">
            <div class="demo">
                <div id="slider-range"></div>
            </div>

            <p>
                <input type="button" id="amount"/>
            </p>
        </div>
    </div>
    </div>
    <div class="col-md-10">
        <div class="product_status">
            <div class="row">
                <div class="col-md-6">
                    <div class="total_product">
                        @if($lang==1)
                        <p>Total <strong>{{$allProducts->total()}}</strong> Product Found</p>
                        @else
                        <p>মোট <strong>{{App\Http\Helper::bnNum($allProducts->total())}}</strong> টি পণ্য পাওয়া গেছে</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="marcent_product_list">
            <div class="row">
                @if(isset($allProducts))
                    @foreach($allProducts as $products)
                        <div class="col-md-4 col-lg-3 col-sm-6">
                            <div class="product_unit">
                                <a href="{{ URL::to('singleProductView').'/'.$products->product_id.'/'.$products->slug}}"
                                   target="">
                                    <img src="{{URL::to('public/images/product')}}/{{$products->path}}" alt="">
                                </a>
                                @if($lang==1)
                                <div class="product_unit_content">
                                    <a href="{{ URL::to('singleProductView').'/'.$products->product_id.'/'.$products->slug}}"
                                       target="">
                                        <h2>{{$products->product_name_lang1}}</h2>
                                    </a>
                                    <div class="price_and_order">
                                        <div class="price">
                                            <h3>৳ {{$products->sale_price}}/-</h3>
                                        </div>
                                        <div class="order">
                                            <button class="btn btn-success"><a href="{{ URL::to('singleProductView').'/'.$products->product_id.'/'.$products->slug}}" target="" style="color: #FFFFFF;">Order</a></button>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="product_unit_content">
                                    <a href="{{ URL::to('singleProductView').'/'.$products->product_id.'/'.$products->slug}}"
                                       target="">
                                        <h2>{{$products->product_name_lang2}}</h2>
                                    </a>
                                    <div class="price_and_order">
                                        <div class="price">
                                            <h3>৳ {{App\Http\Helper::bnNum($products->sale_price)}}/-</h3>
                                        </div>
                                        <div class="order">
                                            <button class="btn btn-success"><a href="{{ URL::to('singleProductView').'/'.$products->product_id.'/'.$products->slug}}" target="" style="color: #FFFFFF;">অর্ডার দিন</a></button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="pagination marg_top" style=" float: right; "> {{ $allProducts->links() }} </div>
        </div>
    </div>

</div>
</section>
<!--Close body content-->

@endsection
