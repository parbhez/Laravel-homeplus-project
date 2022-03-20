@if(isset($products))
    @foreach($products as $product)
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-12" style="background-color: whitesmoke;padding: 20px">
                <div class="col-md-8">
                    <p>
                        <?php
                            $timeArr = explode(' ',$product->updated_at) ;
                        ?>
                        @if(Session::get('frontend_lang') == 1)
                            <strong>Date : </strong>  {{$timeArr[0]}} <strong>Time : </strong>  {{$timeArr[1]}}
                        @else
                            <strong>তারিখ : </strong>  {{$timeArr[0]}}  <strong>সময় : </strong>  {{$timeArr[1]}}
                        @endif
                    </p>
                    <p style="color:red">
                        @if(Session::get('frontend_lang') == 1) {{$product->title_lang1}} @else {{$product->title_lang2}} @endif
                    </p>
                    <p>
                       {{trans('frontend.booking_code')}} : <strong>@if(Session::get('frontend_lang') == 1) {{$product->invoice_no}} @else {{App\Http\Helper::bnNum($product->invoice_no)}}@endif</strong>
                        <a class="btn btn-xs btn-info modal1" data-toggle="modal" href="#modal" style="margin-left: 30px;" onclick="loadModalEdit('orderProductDetailsModal','{{ $product->order_details_id}}','action')">{{trans('frontend.product_detail')}}</a>
                        @if($product->order_status == 0)
                            <a class="btn btn-xs btn-info">Pending</a>
                        @elseif($product->order_status == 1)
                            <a class="btn btn-xs btn-primary">Approved</a>
                        @elseif($product->order_status == 2)
                            <a class="btn btn-xs btn-warning">Shiftment</a>
                        @elseif($product->order_status == 3)
                            <a class="btn btn-xs btn-success">Sale</a>
                        @elseif($product->order_status == 4)
                            <a class="btn btn-xs btn-danger">Admin Deny</a>
                        @elseif($product->order_status == 5)
                            <a class="btn btn-xs btn-danger">Merchant Deny</a>
                        @endif
                    </p>
                    <p>
                        @if(Session::get('frontend_lang') == 1)
                            Customer <strong> {{$product->full_name}}</strong> Your Product <strong> {{$product->product_name_lang1}} (Shopping Code - {{$product->product_code}})</strong> Ordered ।
                        @else
                            ক্রেতা <strong> {{$product->full_name}}</strong> আপনার এই পন্য <strong>{{$product->product_name_lang2}}(ডশপিং কোড - {{App\Http\Helper::bnNum($product->product_code)}}) </strong> অর্ডার করেছে ।
                        @endif
                    </p>
                </div>
                <div class="col-md-2">
                    <img src="{{URL::to('public/images/product').'/'.$product->path}}" style="height: 120px;">
                </div>
                <div class="col-md-2">
                    @if($product->order_status == 1)
                        <a href="javascript:;" onclick="shiftmentConfirm({{$product->order_id}})" class="btn btn-primary btn-xs" id="shiftmetOrder_{{ $product->order_id }}"><span class="fa fa-check"> Shiptemnt </span></a>&nbsp;<br><br>
                        <a class="btn btn-primary btn-xs modal1"  data-toggle="modal" href="#modal" onclick="loadModalEdit('merchantOrderDenyModal','{{ $product->order_id}}','deny')"><span class="fa fa-edit"> Cancel Order </span></a>
                        {{--@if($product->status == 4)
                            <img src="{{URL::to('public/merchantCorner/assets/img/rejected.png')}}" style="height: 120px;">
                        @elseif($product->status == 3)
                            <img src="{{URL::to('public/merchantCorner/assets/img/status.png')}}" style="height: 120px;">
                        @endif--}}
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif
<script>
    $('.modal1').on('click',function(e){
        var title = "{{trans('frontend.order_details')}}"
        $('.modal-title').html(title);
        $('.modal-content').removeClass('modal-big');
        $('.modal-content').addClass('modal-small');
    })
</script>










