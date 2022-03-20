@extends('merchantCorner.app')
@section('content')
    <div class="row" style="margin-bottom: 25px;">
        <div class="col-md-4">
            <label style="padding:7px 15px 7px 15px;border: 1px black solid;">{{trans('frontend.live_deal')}}</label>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <a href="{{URL::to('merchantProduct')}}" class="btn btn-success pull-right no_radius">
                {{trans('frontend.new_product')}}
            </a>
        </div>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="active" role="presentation">
            <a data-periodtype="1" aria-expanded="false" data-value="today" href="#today" aria-controls="today" role="tab" data-toggle="tab">
                {{trans('frontend.today_deal')}}
            </a>
        </li>
        <li class="" role="presentation">
            <a data-periodtype="2" aria-expanded="false" data-value="weekly" href="#this_week" aria-controls="this_week" role="tab"
               data-toggle="tab">
                {{trans('frontend.week_deal')}}
            </a>
        </li>
        <li class="" role="presentation">
            <a data-periodtype="3" aria-expanded="false" data-value="monthly" href="#this_month" aria-controls="this_month" role="tab"
               data-toggle="tab">
                {{trans('frontend.month_deal')}}
            </a>
        </li>
        <li class="" role="presentation">
            <a data-periodtype="4" aria-expanded="true" data-value="total" href="#total" aria-controls="total" role="tab" data-toggle="tab">
                {{trans('frontend.all_deal')}}
            </a>
        </li>
    </ul>

    <div class="tab-content section">
        <div role="tabpanel" class="tab-pane active" id="today">
            <div class="row">
                {{--<div class="col-md-3">--}}
                    {{--<div class="sales_status">--}}
                        {{--<h1>--}}
                            {{--@if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalSale}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalSale)}} @endif--}}
                        {{--</h1>--}}
                        {{--<p> {{trans('frontend.new_sale')}} </p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalPanding}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalPanding)}} @endif
                        </h1>
                        <p> {{trans('frontend.new_order')}} </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalShiftMentProcess}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalShiftMentProcess)}} @endif
                        </h1>
                        <p> {{trans('frontend.shiptment')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalDeny}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalDeny)}} @endif
                        </h1>
                        <p>{{trans('frontend.total_deny')}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="search_box">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="search_input_box">
                                        <input name="serach_content" class="serach_content"  placeholder="{{trans('frontend.search_hints')}}" type="text">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <ul class="select_input_category">
                                        <li style=" float: left;">
                                            <a class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="loadContent"></div>

        </div>

        <div role="tabpanel" class="tab-pane" id="this_week">
            <div class="row">
                {{--<div class="col-md-3">--}}
                    {{--<div class="sales_status">--}}
                        {{--<h1>--}}
                            {{--@if(Session::get('frontend_lang') == 1) {{$weeklyDealingStatus->totalSale}} @else {{App\Http\Helper::bnNum($weeklyDealingStatus->totalSale)}} @endif--}}
                        {{--</h1>--}}
                        {{--<p>{{trans('frontend.new_sale')}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$weeklyDealingStatus->totalPanding}} @else {{App\Http\Helper::bnNum($weeklyDealingStatus->totalPanding)}} @endif
                        </h1>
                        <p> {{trans('frontend.new_order')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalShiftMentProcess}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalShiftMentProcess)}} @endif
                        </h1>
                        <p> {{trans('frontend.shiptment')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$weeklyDealingStatus->totalDeny}} @else {{App\Http\Helper::bnNum($weeklyDealingStatus->totalDeny)}} @endif
                        </h1>
                        <p>{{trans('frontend.total_deny')}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="search_box">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="search_input_box">
                                        <input name="serach_content" class="serach_content"  placeholder="{{trans('frontend.search_hints')}}" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <ul class="select_input_category">
                                        <li style=" float: left;">
                                            <a class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="loadContent"></div>

        </div>

        <div role="tabpanel" class="tab-pane" id="this_month">
            <div class="row">
                {{--<div class="col-md-3">--}}
                    {{--<div class="sales_status">--}}
                        {{--<h1>--}}
                            {{--@if(Session::get('frontend_lang') == 1) {{$monthlyDealingStatus->totalSale}} @else {{App\Http\Helper::bnNum($monthlyDealingStatus->totalSale)}} @endif--}}
                        {{--</h1>--}}
                        {{--<p>{{trans('frontend.new_sale')}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$monthlyDealingStatus->totalPanding}} @else {{App\Http\Helper::bnNum($monthlyDealingStatus->totalPanding)}} @endif
                        </h1>
                        <p> {{trans('frontend.new_order')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalShiftMentProcess}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalShiftMentProcess)}} @endif
                        </h1>
                        <p> {{trans('frontend.shiptment')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$monthlyDealingStatus->totalDeny}} @else {{App\Http\Helper::bnNum($monthlyDealingStatus->totalDeny)}} @endif
                        </h1>
                        <p>{{trans('frontend.total_deny')}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="search_box">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="search_input_box">
                                        <input name="serach_content" class="serach_content"  placeholder="{{trans('frontend.search_hints')}}" type="text">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <ul class="select_input_category">
                                        <li style=" float: left;">
                                            <a class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="loadContent"></div>

        </div>

        <div role="tabpanel" class="tab-pane" id="total">
            <div class="row">
                {{--<div class="col-md-3">--}}
                    {{--<div class="sales_status">--}}
                        {{--<h1>--}}
                            {{--@if(Session::get('frontend_lang') == 1) {{$totalDealingStatus->totalSale}} @else {{App\Http\Helper::bnNum($totalDealingStatus->totalSale)}} @endif--}}
                        {{--</h1>--}}
                        {{--<p>{{trans('frontend.new_sale')}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$totalDealingStatus->totalPanding}} @else {{App\Http\Helper::bnNum($totalDealingStatus->totalPanding)}} @endif
                        </h1>
                        <p> {{trans('frontend.new_order')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$dailyDelingStatus->totalShiftMentProcess}} @else {{App\Http\Helper::bnNum($dailyDelingStatus->totalShiftMentProcess)}} @endif
                        </h1>
                        <p> {{trans('frontend.shiptment')}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sales_status">
                        <h1>
                            @if(Session::get('frontend_lang') == 1) {{$totalDealingStatus->totalDeny}} @else {{App\Http\Helper::bnNum($totalDealingStatus->totalDeny)}} @endif
                        </h1>
                        <p>{{trans('frontend.total_deny')}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="search_box">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="search_input_box">
                                        <input name="serach_content" class="serach_content"  placeholder="{{trans('frontend.search_hints')}}" type="text">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <ul class="select_input_category">
                                        <li style=" float: left;">
                                            <a class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="loadContent"></div>
        </div>
    </div>

    <script>
        var serach_priode = 1;
        $(document).ready(function () {
            loadContent();
        });

        $('.nav li a').on('click',function (e) {
            serach_priode = $(this).attr('data-periodtype');
            loadContent();
        });

        $('.serach_content').on('keyup',function (e) {
            loadContent();
        });

        function loadContent() {
            var serach_content = $('.serach_content').val()
            $('.loadContent').empty();
            $('.loadContent').load("{{URL::to('merchantSaleAndCancleProduct')}}/"+serach_priode+'/'+serach_content);
        }

        function shiftmentConfirm(id) {
            $.ajax({
                url: "merchantShiftmentOrder/" + id,
                dataType: 'json',
                success: function (data) {
                    if (data.success == true) {
                        $('.info-approve').slideDown().delay(1000).slideUp();
                        $("#approveOrder_" + id).parent().parent().hide(1500);
                        location.reload();
                        return false;
                    }
                    else {
                        $('.info-error').slideDown().delay(500).slideUp();
                        return false;
                    }

                }
            });
            return true;
        }
    </script>
@endsection
