@extends('backend.app')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box_body">
                <div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Orders
					</span>
			    </span>
                </div>
                <div class="block" style=" margin-top: 10px; ">
                    <div class="block-content-outer">
                        <div class="block-content-inner">
                            <!-- =======Start Page Content======= -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#viewUser" aria-controls="viewUser"
                                                                          role="tab" data-toggle="tab">View Order</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="viewUser">
                                    <table id="UsersdataTables" class="table table-bordered"
                                           style="width: 100%; font-size: 13px">
                                        <thead>
                                        <tr>
                                            <th># SL no</th>
                                            <th>Customer Name</th>
                                            <th>Invoice</th>
                                            <th>Order Date</th>
                                            <th>Sub Total</th>
                                            <th>Shipping Cost</th>
                                            <th>Total Payable</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                            <th width="50px">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        $lang = Session::get('last_login_lang');
                                        ?>
                                        @if(isset($allOrder))
                                            @foreach($allOrder as $orders)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>
                                                        <span>{{$orders->name}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="#modal" data-toggle="modal" class="modal2" onclick="loadModalEdit('loadOrderDetailsModal','{{ $orders->order_id}}','view')"><span style="font-size: 12px;">{{$orders->invoice_no}}</span></a>
                                                    </td>
                                                    <td>
                                                        <span>{{$orders->order_date}}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{$orders->total_amount}}</span>
                                                    </td>
                                                    <td class="">
                                                        <span>{{$orders->shipping_cost}}</span>
                                                    </td>
                                                    <td class="">
                                                        <span>{{($orders->total_amount + $orders->shipping_cost) - $orders->discount}}</span>
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
                                                            <label class="label label-success">Sale Product</label>
                                                        @elseif($orders->status == 4)
                                                            <label class="label label-danger">Admin Cancel</label>
                                                        @elseif($orders->status == 5)
                                                            <label class="label label-danger">Merchant Cancel</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($orders->status == 0)
                                                            <a href="javascript:;" onclick="approveConfirm({{$orders->order_id}})" class="btn btn-primary btn-sm" id="approveOrder_{{ $orders->order_id }}"><span class="fa fa-check">{{trans('common.approve')}}</span></a></br>
                                                            <a href="javascript:;" onclick="denyConfirm({{$orders->order_id}})" class="btn-update btn btn-primary btn-sm" id="denyOrder_{{ $orders->order_id }}"><span class="fa fa-times">{{trans('common.deny')}}</span></a>
                                                        @elseif($orders->status == 1)
                                                            <a href="javascript:;" onclick="shiftmentConfirm(7)" class="btn btn-primary btn-xs" id="shiftmetOrder_7"><span class="fa fa-check">Shipment</span></a>
                                                        @elseif($orders->status == 2)
                                                            <a href="javascript:;" onclick="saleConfirm({{$orders->order_id}})" class="btn btn-primary btn-xs" id="approveOrder_{{ $orders->order_id }}"><span class="fa fa-check"> Sale</span></a></br>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- =======End Page Content======= -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#UsersdataTables').DataTable();
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            $('.modal-title').html('Edit Order');
            $('.modal-dialog').removeClass('modal-small');
            $('.modal-dialog').addClass('modal-lg');
        });

    </script>

@endsection


<script type="text/javascript">

    
    //===@@ Approve Operation @@=====

    function approveConfirm(orderId) {
        $.ajax({
            url: "approveOrder/" + orderId,
            type: "GET",
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                $('.loading').hide();
                if (data.success == true) {
                    $('.info-approve').slideDown().delay(1000).slideUp();
                    $("#approveOrder_" + orderId).parent().parent().hide();
                    location.reload();
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                }
            },
            error: function () {
                $('.loading').hide();
                alert("Error Occured..!!");
            }
        });
        return true;
    }

    //Sale Confirm Section

    function saleConfirm(orderId) {
        $.ajax({
            url: "saleConfirm/" + orderId,
            type: "GET",
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                $('.loading').hide();
                if (data.success == true) {
                    $('.info-approve').slideDown().delay(1000).slideUp();
                    $("#approveOrder_" + orderId).parent().parent().hide();
                    location.reload();
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                }
            },
            error: function () {
                $('.loading').hide();
                alert("Error Occured..!!");
            }
        });
        return true;
    }

    //===@@ Shiftment Operation @@=====
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
    //===@@ Deny Operation @@=====


    function denyConfirm(orderId) {
        $.ajax({
            url: "denyOrder/" + orderId,
            dataType: 'json',
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                $('.loading').hide();
                if (data.success == true) {
                    $('.info-deny').slideDown().delay(1000).slideUp();
                    $("#denyOrder_" + orderId).parent().prev().html("<label class='label label-danger'>Admin Cancel</label>");
                    location.reload();
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                }

            },
            error: function () {
                $('.loading').hide();
                alert("Error Occured..!!");
            }
        });
        return true;

    }

</script> 