@extends('merchantCorner.app')
@section('content')
<div class="row" style="margin-bottom: 25px;">
    <div class="col-md-10">
        <div class="search_dill">
            {!! Form::open(['route'=>'merchantManagement.post','id'=>'','class'=>'form-inline']) !!}
                <select class="form-control" name="product_type" style="width: 20%">
                    <option selected disabled>{{trans('frontend.product_status')}}</option>
                    <option value="0" @if($productType == 0) selected @endif >{{trans('frontend.pending')}}</option>
                    <option value="1" @if($productType == 1) selected @endif >{{trans('frontend.approved')}}</option>
                    <option value="2" @if($productType == 2) selected @endif >{{trans('frontend.deny')}}</option>
                </select>
                <input type="text" class="form-control" name="product_name" placeholder="{{trans('frontend.product_name')}}" value="{{$productName}}">
                <input type="text" class="form-control" name="product_code" placeholder="{{trans('frontend.product_code')}}" value="{{$productCode}}">
                <input type="submit" class="btn btn-success no_radius" value="{{trans('frontend.product_search')}}">
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-2">
        <a href="" class="btn btn-success pull-right no_radius">
            {{trans('frontend.product_order_set')}}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="pagination_div text-center">
            <nav aria-label="Page navigation">
            {{-- {{$getProducts->links()}}--}}
            </nav>
        </div>
    </div>
</div>


<div class="row" style="margin-bottom: 25px;">
    <div class="col-md-4">
        <div class="product_remain_status">
            <p>{{trans('frontend.product_found_title')}} @if(Session::get('frontend_lang') == 1) {{$getTotalProduct}} @else {{App\Http\Helper::bnNum($getTotalProduct)}}@endif</p>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <a href="{{URL::to('merchantProduct')}}" class="btn btn-success pull-right no_radius">
            {{trans('frontend.new_product')}}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="waiting_product_list">
            <table class="table table-bordered table-responsive table-hover" id="datatable">
                <thead>
                <tr>
                    <th>{{trans('frontend.sl_no')}} </th>
                    <th>{{trans('frontend.image')}}</th>
                    <th>{{trans('frontend.product_detail')}}</th>
                    <th>{{trans('frontend.shopping_code')}}</th>
                    <th>{{trans('frontend.post_date')}}</th>
                    <th>{{trans('frontend.status')}}</th>
                    <th>{{trans('frontend.comments')}}</th>
                    <th>{{trans('frontend.edit')}}</th>
                    <th>{{trans('frontend.show_product')}} </th>
                    <th>{{trans('frontend.stock')}} </th>
                </tr>
                </thead>

                <tbody>
                @if(isset($getProducts))
                    <?php $i = 1; ?>
                    @foreach($getProducts as $product)
                        <tr>
                            <td>
                                @if(Session::get('frontend_lang') == 1) {{$i++}} @else {{App\Http\Helper::bnNum($i++)}} @endif
                            </td>
                            <td>
                                <img src="{{URL::to('public/images/product').'/'.$product->path}}" alt="">
                            </td>
                            <td>
                                <p>@if(Session::get('frontend_lang') == 1) {{$product->product_name_lang1}} @else {{$product->product_name_lang2}} @endif</p>
                            </td>
                            <td>
                                <p>@if(Session::get('frontend_lang') == 1) {{$product->product_code}} @else {{App\Http\Helper::bnNum($product->product_code)}} @endif</p>
                            </td>
                            <td>
                                <p>@if(Session::get('frontend_lang') == 1) {{$product->created_at}} @else {{App\Http\Helper::bnNum($product->created_at)}} @endif</p>
                            </td>
                            <td>
                                <p>
                                    @if($product->status == 0)
                                        <b class="label label-default"> {{trans('frontend.pending')}} </b>
                                    @elseif($product->status == 1)
                                        <b class="label label-primary"> {{trans('frontend.approved')}} </b>
                                    @elseif($product->status == 2)
                                        <b class="label label-danger"> {{trans('frontend.deny')}} </b>
                                    @endif()
                                </p>
                            </td>
                            <td>
                                {{$product->comments}}</p>
                            </td>
                            <td>
                                <a  class="btn btn-sm btn-success" href="{{URL::to('merchantProductEdit').'/'.$product->id.'/'.$product->slug}}"><span class="fa fa-edit"></span> {{trans('frontend.edit')}} </a>
                            </td>
                            <td>
                                <a target="_blank" class="btn btn-sm btn-info" href="{{URL::to('singleProductView').'/'.$product->id.'/'.$product->slug}}"><span class="fa fa-diamond"></span> {{trans('frontend.live_view')}} </a>
                            </td>
                            <td>
                                @if($product->status == 3)
                                    <a href="{{URL::to('merchantStockStatus') .'/'.$product->id.'/1'}}" class="btn btn-success">{{trans('frontend.yes')}}</a>
                                @elseif($product->status == 1)
                                    <a href="{{URL::to('merchantStockStatus') .'/'.$product->id.'/3'}}" class="btn btn-danger">{{trans('frontend.no')}}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="pagination_div text-center">
            <nav aria-label="Page navigation">
                {{--{{$getProducts->links()}}--}}
            </nav>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endsection