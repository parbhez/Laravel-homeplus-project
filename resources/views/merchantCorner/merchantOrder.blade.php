@extends('merchantCorner.app')
@section('content')

<?php $lang  = Session::get('frontend_lang'); $i = 0;?>

<div class="row" style="margin-bottom: 25px;">
    <div class="col-md-12">
        <table id="UsersdataTables" class="table table-bordered table-responsive table-hover">
            <thead>
            <tr>
                <th>{{trans('frontend.sl_no')}}</th>
                <th>{{trans('frontend.invoice_no')}}</th>
                <th>Merchant Invoice</th>
                <th>{{trans('frontend.customer_name')}}</th>
                <th>{{trans('frontend.order_date')}}</th>
                <th>{{trans('frontend.sub_total')}}</th>
                <th>{{trans('frontend.shipping_cost')}}</th>
                <th>{{trans('frontend.discount')}}</th>
                <th>{{trans('frontend.total_amount')}}</th>
                <th>{{trans('frontend.paid_amount')}}</th>
                <th>{{trans('frontend.status')}}</th>
                <th>{{trans('frontend.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($allOrder))
              @foreach($allOrder as $orders)
                @if($lang == 1)
                    <tr>
                        <td class="">{{++$i}}</td>
                        <td class=""><b>{{$orders->master_invoice_no}}</b></td>
                        <td class="">
                            <a href="#modal" data-toggle="modal" class="modal2" onclick="loadModalEdit('orderDetailsModal','{{ $orders->order_id}}','view')"><span style="font-size: 12px; color: red;">{{$orders->invoice_no}}</span></a>
                        </td>
                        <td class="">
                            <span>{{$orders->full_name}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->order_date}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->total_amount}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->shipping_cost}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->discount}}</span>
                        </td>
                        <td class="">
                            <span id="total_amount{{$orders->order_id}}">{{($orders->total_amount + $orders->shipping_cost) - $orders->discount}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->payable}}</span>
                        </td>
                        <td class="">
                            @if($orders->status == 0)
                                <label class="label label-info">Pending</label>
                            @elseif($orders->status == 1)
                                <label class="label label-primary">Approved</label>
                            @elseif($orders->status == 2)
                                <label class="label label-warning">Shipment</label>
                            @elseif($orders->status == 3)
                                <label class="label label-success">Sale</label>
                            @elseif($orders->status == 4)
                                <label class="label label-danger">Admin Deny</label>
                            @elseif($orders->status == 5)
                                <label class="label label-danger">Merchant Deny</label>
                            @endif
                        </td>
                        <td>
                            @if($orders->status < 3)
                            {{--<a href="javascript:;" onclick="approveConfirm({{$orders->order_id}})" class="btn btn-primary btn-xs" id="approveOrder_{{ $orders->order_id }}"><span class="fa fa-check">Sale</span></a>&nbsp;--}}
                            <a href="javascript:;" onclick="shiftmentConfirm({{$orders->order_id}})" class="btn btn-primary btn-xs" id="shiftmetOrder_{{ $orders->order_id }}"><span class="fa fa-check">Shipment</span></a>&nbsp;
                            <a class="btn btn-primary btn-xs modal1"  data-toggle="modal" href="#modal" onclick="loadModalEdit('merchantOrderDenyModal','{{ $orders->order_id}}','deny')"><span class="fa fa-edit">Cancel Order</span></a>
                            @endif
                        </td>
                    </tr>
                    @else
                        <tr>
                        <td class="">{{++$i}}</td>
                        <td class="">
                            <a href="#modal" data-toggle="modal" class="modal2" onclick="loadModalEdit('orderDetailsModal','{{ $orders->order_id}}','view')"><span style="font-size: 12px; color: blue;">{{App\Http\Helper::bnNum($orders->invoice_no)}}</span></a>
                        </td>
                        <td class="">
                            <span>{{$orders->full_name}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->company_name}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->email}}</span>
                        </td>
                        <td class="">
                            <span>{{$orders->order_date}}</span>
                        </td>
                        <td class="">
                            <span>{{App\Http\Helper::bnNum($orders->total_amount)}}</span>
                        </td>
                        <td class="">
                            <span>{{App\Http\Helper::bnNum($orders->shipping_cost)}}</span>
                        </td>
                        <td class="">
                            <span>{{App\Http\Helper::bnNum($orders->discount)}}</span>
                        </td>
                        <td class="">
                            <span id="total_amount{{$orders->order_id}}">{{App\Http\Helper::bnNum(($orders->total_amount + $orders->shipping_cost) - $orders->discount)}}</span>
                        </td>
                        <td class="">
                            <span>{{App\Http\Helper::bnNum($orders->payable)}}</span>
                        </td>
                        <td class="">
                            @if($orders->status == 0)
                                <label class="label label-info">Pending</label>
                            @elseif($orders->status == 1)
                                <label class="label label-primary">Approved</label>
                            @elseif($orders->status == 2)
                                <label class="label label-warning">Shipment</label>
                            @elseif($orders->status == 3)
                                <label class="label label-success">Sale</label>
                            @elseif($orders->status == 4)
                                <label class="label label-danger">Admin Deny</label>
                            @elseif($orders->status == 5)
                                <label class="label label-danger">Merchant Deny</label>
                            @endif
                        </td>
                        <td>
                            @if($orders->status < 3)
                            {{--<a href="javascript:;" onclick="approveConfirm({{$orders->order_id}})" class="btn btn-primary btn-xs" id="approveOrder_{{ $orders->order_id }}"><span class="fa fa-check"> {{trans('forntend.sale')}} </span></a>&nbsp;--}}
                            <a href="javascript:;" onclick="shiftmentConfirm({{$orders->order_id}})" class="btn btn-primary btn-xs" id="shiftmetOrder_{{ $orders->order_id }}"><span class="fa fa-check"> {{trans('forntend.shiptemnt')}} </span></a>&nbsp;
                            <a class="btn btn-primary btn-xs modal1"  data-toggle="modal" href="#modal" onclick="loadModalEdit('merchantOrderDenyModal','{{ $orders->order_id}}','deny')"><span class="fa fa-edit"> {{trans('forntend.cancel_order')}} </span></a>
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
 @if (session('success'))
<script type="text/javascript">
    $('#success').slideDown().delay(2000).slideUp();
</script>
 @endif
    <script type="text/javascript">
        //======Data Table ==========
        $(document).ready(function () {
            $('#UsersdataTables').DataTable();
        });
        //====== Model section=======
        $('.modal1').on('click', function () {
            $('.modal-title').html('Cancel Order');
            $('.modal-content').removeClass('modal-lg');
            $('.modal-content').addClass('modal-md');
        })
        $('.modal2').on('click', function () {
            $('.modal-title').html('Order Details');
            $('.modal-content').removeClass('modal-lg');
            $('.modal-content').addClass('modal-lg');
        })

        //======= Approved section=====
        /*function approveConfirm(id) {
            $.ajax({
                url: "merchantApproveOrder/" + id,
                dataType: 'json',
                success: function (data) {
                    if (data.success == true) {
                        $('.info-approve').slideDown().delay(1000).slideUp();
                        $("#approveOrder_" + id).parent().parent().hide(1500);
                        location.reload();
                    }
                    else {
                        $('.info-error').slideDown().delay(500).slideUp();
                    }
                }
            });
            return true;
        }*/

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