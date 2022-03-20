@extends('frontend.app')
@section('main_container')
    @include('frontend._partials.leftNavigation')
    <div class="col-md-9">
        <?php $lang = Session::get('frontend_lang');
           $data = count($products);
         ?>
         @if($data <= 0)
            @if($lang == 1 )
                <div class="container" style="font-size: 20px; margin:100px; padding: 15px; color: purple">No Product Found.</div>
            @else
                <div class="container" style="font-size: 20px; margin:100px; padding: 15px;color: purple">কোন পন্য পাওয়া যায়নি.</div>

            @endif
         @endif
        @if(isset($products))
            @foreach($products as $product)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="product_unit">
                        <a href="{{ URL::to('product-details').'/'.$product->product_id.'/'.$product->slug}}"
                           target="">
                            <img src="{{URL::to('public/images/product')}}/{{$product->path}}" alt="">
                        </a>
                        @if($lang==1)
                            <div class="product_unit_content">
                                <a href="{{ URL::to('product-details').'/'.$product->product_id.'/'.$product->slug}}"
                                   target="">
                                    <h2>{{$product->product_name_lang1}}</h2>
                                </a>
                                <div class="price_and_order">
                                    <div class="price">
                                        <h3>৳ {{$product->sale_price}}/-</h3>
                                    </div>
                                    <div class="order">
                                        {{--<button class="btn btn-success"><a href="{{ URL::to('product-details').'/'.$product->product_id.'/'.$product->slug}}" target="" style="color: #FFFFFF;">Order</a></button>--}}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="product_unit_content">
                                <a href="{{ URL::to('product-details').'/'.$product->product_id.'/'.$product->slug}}"
                                   target="">
                                    <h2>{{$product->product_name_lang2}}</h2>
                                </a>
                                <div class="price_and_order">
                                    <div class="price">
                                        <h3>৳ {{App\Http\Helper::bnNum($product->sale_price)}}/-</h3>
                                    </div>
                                    <div class="order">
                                        {{--<button class="btn btn-success"><a href="{{ URL::to('product-details').'/'.$product->product_id.'/'.$product->slug}}" target="" style="color: #FFFFFF;">অর্ডার দিন</a></button>--}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
</div>
</section>
    <br><br><br><br><br><br><br><br>
@endsection
